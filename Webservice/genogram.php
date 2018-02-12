<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Healthier Together</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  <script src="go.js"></script>
  <script>

    function init() {

      if (window.goSamples) goSamples();  // init for these samples -- you don't need to call this
      var $ = go.GraphObject.make;

      myDiagram =
        $(go.Diagram, "myDiagramDiv",
          {
            initialAutoScale: go.Diagram.Uniform,
            initialContentAlignment: go.Spot.Center,
            allowDrop: true,

            "undoManager.isEnabled": true,
            // when a node is selected, draw a big yellow circle behind it
            nodeSelectionAdornmentTemplate:
              $(go.Adornment, "Auto",
                { layerName: "Grid" },  // the predefined layer that is behind everything else
                $(go.Shape, "Circle", { fill: "yellow", stroke: null }),
                $(go.Placeholder)
              ),
            layout:  // use a custom layout, defined below
              $(GenogramLayout, { direction: 90, layerSpacing: 30, columnSpacing: 10 })
          });



          myDiagram.addDiagramListener("Modified", function(e) {
            var button = document.getElementById("SaveButton");
            if (button) button.disabled = !myDiagram.isModified;
            var idx = document.title.indexOf("*");
            if (myDiagram.isModified) {
              if (idx < 0) document.title += "*";
            } else {
              if (idx >= 0) document.title = document.title.substr(0, idx);
            }
          });

      // two different node templates, one for each sex,
      // named by the category value in the node data object
      myDiagram.nodeTemplateMap.add("M",  // male
        $(go.Node, "Vertical",
          { locationSpot: go.Spot.Center, locationObjectName: "ICON" },
          $(go.Panel,
            { name: "ICON" },
            $(go.Shape, "Square",
              { width: 50, height: 50, strokeWidth: 2, fill: "white", portId: "" }),

          ),
          $(go.TextBlock,
              { textAlign: "center", maxSize: new go.Size(200, NaN),editable: true, margin:3,font:"bold 11pt serif"},
            new go.Binding("text", "n").makeTwoWay()),
            $(go.TextBlock,
              { textAlign: "center",stroke: "green", maxSize: new go.Size(150, NaN), editable: true },
              new go.Binding("text", "ag").makeTwoWay())
        ));

      myDiagram.nodeTemplateMap.add("F",  // female
        $(go.Node, "Vertical",
          { locationSpot: go.Spot.Center, locationObjectName: "ICON" },
          $(go.Panel,
            { name: "ICON" },
            $(go.Shape, "Circle",
              { width: 50, height: 50, strokeWidth: 2, fill: "white", portId: "" }),
          ),
          $(go.TextBlock,
            { textAlign: "center", maxSize: new go.Size(200, NaN),editable: true, margin:3,font:"bold 11pt serif"},
            new go.Binding("text", "n").makeTwoWay()),
            $(go.TextBlock,
              { textAlign: "center",stroke: "green", maxSize: new go.Size(150, NaN),editable: true },
              new go.Binding("text", "ag").makeTwoWay())

        ));

      // the representation of each label node -- nothing shows on a Marriage Link
      myDiagram.nodeTemplateMap.add("LinkLabel",
        $(go.Node, { selectable: false, width: 1, height: 1, fromEndSegmentLength: 20 }));


      myDiagram.linkTemplate =  // for parent-child relationships
        $(go.Link,
          {
            routing: go.Link.Orthogonal,
            curviness: 15,
            layerName: "Background",
            selectable: false,
            fromSpot: go.Spot.Bottom,
            toSpot: go.Spot.Top
          },
          $(go.Shape, { strokeWidth: 2 })
        );

      myDiagram.linkTemplateMap.add("Marriage",  // for marriage relationships
        $(go.Link,
          { selectable: false },
          $(go.Shape, { strokeWidth: 2, stroke: "blue" })
      ));

      setupDiagram(myDiagram,dataj);

    }//end init



    function enable(name, ok) {
      var button = document.getElementById(name);
        if (button) button.disabled = !ok;
    }

    function rename(obj) {
      if (!obj) obj = myDiagram.selection.first();
        if (!obj) return;
          myDiagram.startTransaction("rename");
            var newName = prompt("Rename " + obj.part.data.item + " to:", obj.part.data.item);
            myDiagram.model.setDataProperty(obj.part.data, "item", newName);
            myDiagram.commitTransaction("rename");
    }

    function save() {
      var dee = document.getElementById("mySavedModel").value
      // document.getElementById("mySavedModel").value = myDiagram.model.toJson();
      // myDiagram.isModified = false;
    }

    function makeSVG() {
      var svg = myDiagram.makeSvg({
          scale: 0.5
        });
      svg.style.border = "1px solid black";
      obj = document.getElementById("SVGArea");
      obj.appendChild(svg);
      if (obj.children.length > 0) {
        obj.replaceChild(svg, obj.children[0]);
      }
    }


    // create and initialize the Diagram.model given an array of node data representing people
    function setupDiagram(diagram,array) {
      // dataj = array;
      diagram.model =
        go.GraphObject.make(go.GraphLinksModel,
          { // declare support for link label nodes
            linkLabelKeysProperty: "labelKeys",
            // this property determines which template is used
            nodeCategoryProperty: "s",
            // create all of the nodes for people
            nodeDataArray:array
          });
      setupMarriages(diagram);
      setupParents(diagram);


    }
    // dataj = [];
    function setupmyPalettem(diagram, dataj) {
      diagram.model =
        go.GraphObject.make(go.GraphLinksModel,
          { // declare support for link label nodes
            linkLabelKeysProperty: "labelKeys",
            // this property determines which template is used
            nodeCategoryProperty: "s",
            // create all of the nodes for people
            nodeDataArray: dataj
          });
      setupMarriages(diagram);
      setupParents(diagram);


    }



    //ส่วนของการสร้างเลเยอร์ของไดแกรม
    function findMarriage(diagram, a, b) {  // A and B are node keys
      var nodeA = diagram.findNodeForKey(a);
      var nodeB = diagram.findNodeForKey(b);
      if (nodeA !== null && nodeB !== null) {
        var it = nodeA.findLinksBetween(nodeB);  // in either direction
        while (it.next()) {
          var link = it.value;
          // Link.data.category === "Marriage" means it's a marriage relationship
          if (link.data !== null && link.data.category === "Marriage") return link;
        }
      }
      return null;
    }

    // now process the node data to determine marriages
    function setupMarriages(diagram) {
      var model = diagram.model;
      var nodeDataArray = model.nodeDataArray; // json ที่เก็บข้อมูลแสดง
      for (var i = 0; i < nodeDataArray.length; i++) {
        var data = nodeDataArray[i];
        var key = data.key;
        var uxs = data.ux;
        if (uxs !== undefined) {
          if (typeof uxs === "number") uxs = [ uxs ];
          for (var j = 0; j < uxs.length; j++) {
            var wife = uxs[j];
            if (key === wife) {
              // or warn no reflexive marriages
              continue;
            }
            var link = findMarriage(diagram, key, wife);
            if (link === null) {
              // add a label node for the marriage link
              var mlab = { s: "LinkLabel" };
              model.addNodeData(mlab);
              var lak = [mlab.key];
              // add the marriage link itself, also referring to the label node
              var mdata = { from: key, to: wife, labelKeys: lak, category: "Marriage" };
              model.addLinkData(mdata);
            }
          }
        }

        var virs = data.vir;
        if (virs !== undefined) {
          if (typeof virs === "number") virs = [ virs ];
          for (var j = 0; j < virs.length; j++) {
            var husband = virs[j];
            if (key === husband) {
              // or warn no reflexive marriages
              continue;
            }
            var link = findMarriage(diagram, key, husband);
            if (link === null) {
              // add a label node for the marriage link
              var mlab = { s: "LinkLabel" };
              model.addNodeData(mlab);
              // add the marriage link itself, also referring to the label node
              var mdata = { from: key, to: husband, labelKeys: [mlab.key], category: "Marriage" };
              model.addLinkData(mdata);
            }
          }
        }
      }

    }

    // process parent-child relationships once all marriages are known
    function setupParents(diagram) {
      var model = diagram.model;
      var nodeDataArray = model.nodeDataArray;
      for (var i = 0; i < nodeDataArray.length; i++) {
        var data = nodeDataArray[i];
        var key = data.key;
        var mother = data.m;
        var father = data.f;
        if (mother !== undefined && father !== undefined) {
          var link = findMarriage(diagram, mother, father);
          if (link === null) {
            // or warn no known mother or no known father or no known marriage between them
            if (window.console) window.console.log("unknown marriage: " + mother + " & " + father);
            continue;
          }
          var mdata = link.data;
          var mlabkey = mdata.labelKeys[0];
          var cdata = { from: mlabkey, to: key };
          myDiagram.model.addLinkData(cdata);
        }
      }
    }


    // A custom layout that shows the two families related to a person's parents
    function GenogramLayout() {
      go.LayeredDigraphLayout.call(this);
      this.initializeOption = go.LayeredDigraphLayout.InitDepthFirstIn;
      this.spouseSpacing = 30;  // minimum space between spouses
    }
    go.Diagram.inherit(GenogramLayout, go.LayeredDigraphLayout);

    /** @override */
    GenogramLayout.prototype.makeNetwork = function(coll) {
      // generate LayoutEdges for each parent-child Link
      var net = this.createNetwork();
      if (coll instanceof go.Diagram) {
        this.add(net, coll.nodes, true);
        this.add(net, coll.links, true);
      } else if (coll instanceof go.Group) {
        this.add(net, coll.memberParts, false);
      } else if (coll.iterator) {
        this.add(net, coll.iterator, false);
      }
      return net;
    };

    // internal method for creating LayeredDigraphNetwork where husband/wife pairs are represented
    // by a single LayeredDigraphVertex corresponding to the label Node on the marriage Link
    GenogramLayout.prototype.add = function(net, coll, nonmemberonly) {
      var multiSpousePeople = new go.Set();
      // consider all Nodes in the given collection
      var it = coll.iterator;
      while (it.next()) {
        var node = it.value;
        if (!(node instanceof go.Node)) continue;
        if (!node.isLayoutPositioned || !node.isVisible()) continue;
        if (nonmemberonly && node.containingGroup !== null) continue;
        // if it's an unmarried Node, or if it's a Link Label Node, create a LayoutVertex for it
        if (node.isLinkLabel) {
          // get marriage Link
          var link = node.labeledLink;
          var spouseA = link.fromNode;
          var spouseB = link.toNode;
          // create vertex representing both husband and wife
          var vertex = net.addNode(node);
          // now define the vertex size to be big enough to hold both spouses
          vertex.width = spouseA.actualBounds.width + this.spouseSpacing + spouseB.actualBounds.width;
          vertex.height = Math.max(spouseA.actualBounds.height, spouseB.actualBounds.height);
          vertex.focus = new go.Point(spouseA.actualBounds.width + this.spouseSpacing / 2, vertex.height / 2);
        } else {
          // don't add a vertex for any married person!
          // instead, code above adds label node for marriage link
          // assume a marriage Link has a label Node
          var marriages = 0;
          node.linksConnected.each(function(l) { if (l.isLabeledLink) marriages++; });
          if (marriages === 0) {
            var vertex = net.addNode(node);
          } else if (marriages > 1) {
            multiSpousePeople.add(node);
          }
        }
      }
      // now do all Links
      it.reset();
      while (it.next()) {
        var link = it.value;
        if (!(link instanceof go.Link)) continue;
        if (!link.isLayoutPositioned || !link.isVisible()) continue;
        if (nonmemberonly && link.containingGroup !== null) continue;
        // if it's a parent-child link, add a LayoutEdge for it
        if (!link.isLabeledLink) {
          var parent = net.findVertex(link.fromNode);  // should be a label node
          var child = net.findVertex(link.toNode);
          if (child !== null) {  // an unmarried child
            net.linkVertexes(parent, child, link);
          } else {  // a married child
            link.toNode.linksConnected.each(function(l) {
              if (!l.isLabeledLink) return;  // if it has no label node, it's a parent-child link
              // found the Marriage Link, now get its label Node
              var mlab = l.labelNodes.first();
              // parent-child link should connect with the label node,
              // so the LayoutEdge should connect with the LayoutVertex representing the label node
              var mlabvert = net.findVertex(mlab);
              if (mlabvert !== null) {
                net.linkVertexes(parent, mlabvert, link);
              }
            });
          }
        }
      }

      while (multiSpousePeople.count > 0) {
        // find all collections of people that are indirectly married to each other
        var node = multiSpousePeople.first();
        var cohort = new go.Set();
        this.extendCohort(cohort, node);
        // then encourage them all to be the same generation by connecting them all with a common vertex
        var dummyvert = net.createVertex();
        net.addVertex(dummyvert);
        var marriages = new go.Set();
        cohort.each(function(n) {
          n.linksConnected.each(function(l) {
            marriages.add(l);
          })
        });
        marriages.each(function(link) {
          // find the vertex for the marriage link (i.e. for the label node)
          var mlab = link.labelNodes.first()
          var v = net.findVertex(mlab);
          if (v !== null) {
            net.linkVertexes(dummyvert, v, null);
          }
        });
        // done with these people, now see if there are any other multiple-married people
        multiSpousePeople.removeAll(cohort);
      }
    };

    // collect all of the people indirectly married with a person
    GenogramLayout.prototype.extendCohort = function(coll, node) {
      if (coll.contains(node)) return;
      coll.add(node);
      var lay = this;
      node.linksConnected.each(function(l) {
        if (l.isLabeledLink) {  // if it's a marriage link, continue with both spouses
          lay.extendCohort(coll, l.fromNode);
          lay.extendCohort(coll, l.toNode);
        }
      });
    };

    /** @override */
    GenogramLayout.prototype.assignLayers = function() {
      go.LayeredDigraphLayout.prototype.assignLayers.call(this);
      var horiz = this.direction == 0.0 || this.direction == 180.0;
      // for every vertex, record the maximum vertex width or height for the vertex's layer
      var maxsizes = [];
      this.network.vertexes.each(function(v) {
        var lay = v.layer;
        var max = maxsizes[lay];
        if (max === undefined) max = 0;
        var sz = (horiz ? v.width : v.height);
        if (sz > max) maxsizes[lay] = sz;
      });
      // now make sure every vertex has the maximum width or height according to which layer it is in,
      // and aligned on the left (if horizontal) or the top (if vertical)
      this.network.vertexes.each(function(v) {
        var lay = v.layer;
        var max = maxsizes[lay];
        if (horiz) {
          v.focus = new go.Point(0, v.height / 2);
          v.width = max;
        } else {
          v.focus = new go.Point(v.width / 2, 0);
          v.height = max;
        }
      });
      // from now on, the LayeredDigraphLayout will think that the Node is bigger than it really is
      // (other than the ones that are the widest or tallest in their respective layer).
    };

    /** @override */
    GenogramLayout.prototype.commitNodes = function() {
      go.LayeredDigraphLayout.prototype.commitNodes.call(this);
      // position regular nodes
      this.network.vertexes.each(function(v) {
        if (v.node !== null && !v.node.isLinkLabel) {
          v.node.position = new go.Point(v.x, v.y);
        }
      });
      // position the spouses of each marriage vertex
      var layout = this;
      this.network.vertexes.each(function(v) {
        if (v.node === null) return;
        if (!v.node.isLinkLabel) return;
        var labnode = v.node;
        var lablink = labnode.labeledLink;
        // In case the spouses are not actually moved, we need to have the marriage link
        // position the label node, because LayoutVertex.commit() was called above on these vertexes.
        // Alternatively we could override LayoutVetex.commit to be a no-op for label node vertexes.
        lablink.invalidateRoute();
        var spouseA = lablink.fromNode;
        var spouseB = lablink.toNode;
        // prefer fathers on the left, mothers on the right
        if (spouseA.data.s === "F") {  // sex is female
          var temp = spouseA;
          spouseA = spouseB;
          spouseB = temp;
        }
        // see if the parents are on the desired sides, to avoid a link crossing
        var aParentsNode = layout.findParentsMarriageLabelNode(spouseA);
        var bParentsNode = layout.findParentsMarriageLabelNode(spouseB);
        if (aParentsNode !== null && bParentsNode !== null && aParentsNode.position.x > bParentsNode.position.x) {
          // swap the spouses
          var temp = spouseA;
          spouseA = spouseB;
          spouseB = temp;
        }
        spouseA.position = new go.Point(v.x, v.y);
        spouseB.position = new go.Point(v.x + spouseA.actualBounds.width + layout.spouseSpacing, v.y);
        if (spouseA.opacity === 0) {
          var pos = new go.Point(v.centerX - spouseA.actualBounds.width / 2, v.y);
          spouseA.position = pos;
          spouseB.position = pos;
        } else if (spouseB.opacity === 0) {
          var pos = new go.Point(v.centerX - spouseB.actualBounds.width / 2, v.y);
          spouseA.position = pos;
          spouseB.position = pos;
        }
      });
      // position only-child nodes to be under the marriage label node
      this.network.vertexes.each(function(v) {
        if (v.node === null || v.node.linksConnected.count > 1) return;
        var mnode = layout.findParentsMarriageLabelNode(v.node);
        if (mnode !== null && mnode.linksConnected.count === 1) {  // if only one child
          var mvert = layout.network.findVertex(mnode);
          var newbnds = v.node.actualBounds.copy();
          newbnds.x = mvert.centerX - v.node.actualBounds.width / 2;
          // see if there's any empty space at the horizontal mid-point in that layer
          var overlaps = layout.diagram.findObjectsIn(newbnds, function(x) { return x.part; }, function(p) { return p !== v.node; }, true);
          if (overlaps.count === 0) {
            v.node.move(newbnds.position);
          }
        }
      });
    };

    GenogramLayout.prototype.findParentsMarriageLabelNode = function(node) {
      var it = node.findNodesInto();
      while (it.next()) {
        var n = it.value;
        if (n.isLinkLabel) return n;
      }
      return null;
    };
    // end GenogramLayout class


  function load() {
    // myDiagram.model = go.Model.fromJson(document.getElementById("mySavedModel").value);
    // dataj = [];


  }


  </script>

  <?php
  // header("content-type:text/javascript;charset=utf-8");
  define('HOST','localhost'); //ชื่อ host
  define('USER','root'); //username
  define('PASS','root'); //password
  define('DB','senior_healthiertogether'); // ชื่อ database ที่จะติดต่อ

   if($_SERVER['REQUEST_METHOD']=='GET'){
    $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect'); //ต่อฐานข้อมูล

    mysqli_set_charset($con,"utf8");

    $sql = "SELECT * FROM geno_family ";

    $r = mysqli_query($con,$sql);
    $result = array();
      while($row = mysqli_fetch_array($r)) {
          array_push($result,array(
            "key"=>$row['key_no'],
            "n"=>$row["name"],
            "s"=>$row["sex"],
            "ag"=>$row["age"],
            "m"=>$row["mom"]?$row["mom"]:'',
            "f"=>$row["father"]?$row["father"]:'',
            "ux"=>$row["wife"]?$row["wife"]:'',
            "vir"=>$row["husband"]?$row["husband"]:''
          ));
      }
    $myJSON = json_encode(($result),JSON_UNESCAPED_UNICODE);

    mysqli_close($con);
   }

    // $myJSON = json_encode(($data),JSON_UNESCAPED_UNICODE);

    echo '<script type="text/javascript">';
    echo "var dataj = $myJSON;"; // ส่งค่า $data จาก PHP ไปยังตัวแปร data ของ Javascript
    echo '</script>';
  ?>






</head>

<body onload="init()" class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html" style="font-size:25px">Healthier Together</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion"><br>
        <div class="testimonial-image">
          <center><img src="img/profile/user10.png" width="100px" height="100px"></center>
        </div>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.html">
            <center><span class="nav-link-text">นางวิไลลักษณ์  แหวนเงิน</span></center>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home" style="font-size:18px">
          <a class="nav-link" href="index.php">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span class="nav-link-text">หน้าแรก</span>
          </a>
        </li>


        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components" style="font-size:18px">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-gears"></i>
            <span class="nav-link-text">การจัดการ</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="patient.php">ผู้ป่วย</a>
            </li>
            <li>
              <a href="cards.html">บุคลาการทางการแพทย์</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts" style="font-size:18px">
          <a class="nav-link" href="mysick.php">
            <i class="fa fa-street-view"></i>
            <span class="nav-link-text">แผนที่รายงานกลุ่มเสี่ยง</span>
          </a>
        </li>

      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>ออกจากระบบ</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">หน้าแรก</a>
          <li class="breadcrumb-item active"><a href="patient.php">ผู้ป่วย</a></li>
            <li class="breadcrumb-item active">ข้อมูลส่วนตัว</li>
        </li>

      </ol>
      <br>
      <ul class="nav nav-tabs" style="font-size:20px">
          <li class="nav-item">
            <a class="nav-link " href="profile_p.php">ข้อมูลประวัต</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="genogram.php">ผังครอบครัว</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">รายงานผล</a>
          </li>

        </ul>

        <br>  <br>

  <center><button type="button" class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">เพิ่มสมาชิก <i class="fa fa-user-plus"></i></button></center>
  <br>

<div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เพิ่มสมาชิกในครอบครัว</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
      <form method="post" action="form_genogram.php">
        <div class="row">
          <div class="form-group col-md-7 ">
            <label for="recipient-name" class="form-control-label">ชื่อ:</label>
            <input type = "text" class = "form-control" name= "name">
          </div>
          <div class="form-group col-md-3">
            <label for="message-text" class="form-control-label">อายุ:</label>
            <select class="form-control" name= "ag">
              <!-- <option></option> -->
              <?php
              for($i=1; $i<=200 ;$i++){
                  echo "<option value=$i>$i</option>";
              }
              ?>
            </select>
            <!-- <input type = "number" class = "form-control" name= "ag"> -->
          </div>
        </div>

        <div class="row">
        <div class="form-group col-md-5">
          <?php
          include "config.php";
          $objConnect = mysql_connect("$servername","$username","$password") or die("Error Connect to Database");
          $objDB = mysql_select_db("$dbname");
          $strSQL = "SELECT * From geno_family WHERE wife IS NULL AND husband IS NULL AND sex ='M' ";
          $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]")
          ?>
          <label for="message-text" class="form-control-label">สามี</label>
          <select class="form-control" name= "vir">
            <option value=" "></option>
            <?php
            while($objResult = mysql_fetch_array($objQuery)){
            ?>
            <option value="<?php echo $objResult["key_no"];?>"><?php echo $objResult["name"];?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <?php
        mysql_close($objConnect);
        ?>

        <div class="form-group col-md-2">
        <!-- <label>  </label>
        <span class="badge badge-secondary">หรือ</span> -->
        <label for="recipient-name" class="form-control-label"></label>
        <button type="button" class="btn btn-light">หรือ</button>
        <!-- <input class="btn btn-primary" type="submit" value="หรือ"> -->

          </div>


        <div class="form-group col-md-5">
          <?php
          include "config.php";
          $objConnect = mysql_connect("$servername","$username","$password") or die("Error Connect to Database");
          $objDB = mysql_select_db("$dbname");
          $strSQL = "SELECT * From geno_family WHERE wife IS NULL AND husband IS NULL AND sex ='F' ";
          $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]")
          ?>
          <label for="message-text" class="form-control-label">ภรรยา</label>
          <select class="form-control" name= "ux">
            <option value=" "></option>
            <?php
            while($objResult = mysql_fetch_array($objQuery)){
            ?>
            <option value="<?php echo $objResult["key_no"];?>"><?php echo $objResult["name"];?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <?php
        mysql_close($objConnect);
        ?>

      </div>



          <div class="form-group col-md-6">
            <?php
            include "config.php";
            $objConnect = mysql_connect("$servername","$username","$password") or die("Error Connect to Database");
            $objDB = mysql_select_db("$dbname");
            $strSQL = "SELECT * From geno_family WHERE sex ='M' ";
            $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]")
            ?>
            <label for="message-text" class="form-control-label">พ่อ</label>
            <!-- <input type = "number" class = "form-control" name= "fater"> -->

            <select class="form-control" name= "fater">
              <option value="0"></option>
              <?php
              while($objResult = mysql_fetch_array($objQuery)){
              ?>
              <option value="<?php echo $objResult["key_no"];?>"><?php echo $objResult["name"];?></option>
              <?php
              }
              ?>
            </select>

          </div>
          <?php
          mysql_close($objConnect);
          ?>
          <div class="form-group col-md-6">
            <?php
            include "config.php";
            $objConnect = mysql_connect("$servername","$username","$password") or die("Error Connect to Database");
            $objDB = mysql_select_db("$dbname");
            $strSQL = "SELECT * From geno_family WHERE sex ='F' ";
            $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]")
            ?>
            <label for="message-text" class="form-control-label">แม่</label>
            <select class="form-control" name= "mom">
              <option value=" "></option>
              <?php
              while($objResult = mysql_fetch_array($objQuery)){
              ?>
              <option value="<?php echo $objResult["key_no"];?>"><?php echo $objResult["name"];?></option>
              <?php
              }
              ?>
            </select>

          </div>
          <?php
          mysql_close($objConnect);
          ?>


          <div class="form-group col-md-10">
          <label for = "man"></label>เพศ : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type = "radio" name ="sex" id = "M" value = "M"/> ชาย
          <label for = "Lady"></label>&nbsp;&nbsp;
          <input type = "radio" name ="sex" id = "F" value = "F"/> หญิง
            </div>

        </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
            <button type = "submit" class="btn btn-primary" id = "submit">บันทึก</button>
          </div>

        </form>

      </div>

    </div>
  </div>
</div>



      <!-- Icon Cards-->
    <div class="container">
      <div class="row">
        <!-- <div class="col-md-12">
          <button onclick="load()">Load</button>
        </div> -->
        <div class="col-xl-12">
          <div id="sample">
            <div id="myDiagramDiv" style="border: solid 1px black; width:100%; height:600px">

            </div>
          </div>
        </div>
        <!-- <button id="SaveButton" onclick="save()">Save</button> -->






        </div>
    </div>


    </div>
  </div>








    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- <?php
    $n = $_POST["name"];

    echo "<script>";
    echo "alert(\" $n\");";
    echo "</script>";

    ?> -->

    <script>
    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-title').text('New message to ' + recipient)
      modal.find('.modal-body input').val(recipient)
      })
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
