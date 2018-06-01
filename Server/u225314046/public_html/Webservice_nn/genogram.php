<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Healthier Together</title>

    <!-- Bootstrap Core CSS -->
    <!-- <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

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
          $(go.Panel, "Auto",
            { name: "ICON" },
            $(go.Shape, "Square",
              { width: 50, height: 50, strokeWidth: 2, fill: "white", portId: "" }),
              $(go.Shape, "Square", { width: 35, height: 35, fill: "white" },
                new go.Binding("stroke", "color" , function(err) { return err ? "black" : "White" }),
              ),
          ),

          $(go.Panel, "Horizontal",  // the row of status indicators
             // makeIndicator("ind"),
             $(go.Shape, "Circle",
                { alignment: go.Spot.Center,
                  fill: "red", width: 14, height: 14,
                  visible: false },
                new go.Binding("visible", "dia", function(i) { return i ? true : false; })),

              $(go.Shape, "Circle",
                   { alignment: go.Spot.Center,
                     fill: "blue", width: 14, height: 14,
                     visible: false },
                   new go.Binding("visible", "hyper" , function(i) { return i ? true : false; })),

             $(go.TextBlock,
                 { textAlign: "center", maxSize: new go.Size(200, NaN),editable: true, margin:3,font:"bold 11pt serif"},
               new go.Binding("text", "n")),

           ),  // end Horizontal Panel

            $(go.TextBlock,
              { textAlign: "center",stroke: "green", maxSize: new go.Size(150, NaN), editable: true },
              new go.Binding("text", "ag")),
              // $(go.Panel,   // the row of status indicators
              //    makeIndicator("ind")
              //  ),  // end Horizontal Panel


        ));
        // $(go.Panel, "Horizontal",  // the row of status indicators
        //    makeIndicator("ind0"),
        //    makeIndicator("ind1"),
        //    makeIndicator("ind2")
        //  ),  // end Horizontal Panel

      myDiagram.nodeTemplateMap.add("F",  // female
        $(go.Node, "Vertical",
          { locationSpot: go.Spot.Center, locationObjectName: "ICON" },
          $(go.Panel, "Auto",
            { name: "ICON" },
            $(go.Shape, "Circle",
              { width: 50, height: 50, strokeWidth: 2, fill: "white", portId: "" }),
              $(go.Shape, "Circle", { width: 35, height: 35, fill: "white" },
                new go.Binding("stroke", "color" , function(err) { return err ? "black" : "White" }),
              ),
          ),

          // $(go.Panel, "Auto",
          //   $(go.Shape, "Circle", { name: "SHAPE", width: 50, height: 50, fill: "white",strokeWidth: 2 }),
          //   // $(go.Shape, "Circle", { width: 35, height: 35, fill: "white" }),
          //   // new go.Binding("stroke", "color")
          // ),


          $(go.Panel, "Horizontal",  // the row of status indicators
             // makeIndicator("ind"),
             $(go.Shape, "Circle",
                { alignment: go.Spot.Center,
                  fill: "red", width: 14, height: 14,
                  visible: false },
                new go.Binding("visible", "dia", function(i) { return i ? true : false; })),

              $(go.Shape, "Circle",
                   { alignment: go.Spot.Center,
                     fill: "blue", width: 14, height: 14,
                     visible: false },
                   new go.Binding("visible", "hyper" , function(i) { return i ? true : false; })),

             $(go.TextBlock,
                 { textAlign: "center", maxSize: new go.Size(200, NaN),editable: true, margin:3,font:"bold 11pt serif"},
               new go.Binding("text", "n"))

           ),  // end Horizontal Panel

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
  include "config.php";

   if($_SERVER['REQUEST_METHOD']=='GET'){
    $con = mysqli_connect($servername, $username, $password, $database)or die("Error Connect to Database");

    mysqli_set_charset($con,"utf8");

    $sql = "SELECT * FROM genogram ";

    $r = mysqli_query($con,$sql);
    $result = array();
      while($row = mysqli_fetch_array($r)) {
        $b=$row["byear"];
        $y=date("Y")-$b;


          array_push($result,array(
            "key"=>$row['key_no'],
            "n"=>$row["name"],
            "s"=>$row["sex"],
            "ag"=>$y,
            //
            // "m"=>$row["mom"],
            // "f"=>$row["father"],
            // "ux"=>$row["wife"],
            // "vir"=>$row["husband"],
            // "dia"=>$row["diabetes"],
            // "hyper"=>$row["hyper"],
            // "color"=>$row["fig"]

            "m"=>$row["mom"]?$row["mom"]:'',
            "f"=>$row["father"]?$row["father"]:'',
            "ux"=>$row["wife"]?$row["wife"]:'',
            "vir"=>$row["husband"]?$row["husband"]:'',
            "dia"=>$row["diabetes"]?$row["diabetes"]:'',
            "hyper"=>$row["hyper"]?$row["hyper"]:'',
            "color"=>$row["fig"]?$row["fig"]:''


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

<body onload="init()">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html" style="font-size:25px">
                  <i class="fa fa-heartbeat" aria-hidden="true"></i> Healthier Together</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">


                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> ข้อมูลส่วนตัว</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> การตั้งค่า</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> ออกจากระบบ</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default_2 sidebar" role="navigation" style="font-size:17px">
                <div class="sidebar-nav navbar-collapse"><br>
                    <ul class="nav" id="side-menu">
                      <div class="testimonial-image">
                          <center><img src="../img/profile/user10.png" width="100px" height="100px"></center>
                        </div>

                            <center><span class="nav-link-text">นางวิไลลักษณ์  แหวนเงิน</span></center>
                          </a><br>

                        <li>
                            <a href="home.php"><i class="fa fa-home" aria-hidden="true"></i> หน้าแรก</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-gears"></i> การจัดการ<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="patient.php">ผู้ป่วย</a>
                                </li>
                                <li>
                                      <a href="authorities.php">บุคลาการทางการแพทย์</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-street-view"></i> แผนที่รายงานกลุ่มเสี่ยง</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i> สรุปรายงานผล</a>
                        </li>



                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>



        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                  <br>  <br>
                    <div class="col-md-12">
                      <ul class="nav nav-tabs" style="font-size:16px">
                      <li ><a href="profile_p.php" >ข้อมูลประวัติ</a>
                      </li>
                      <li class="active"><a href="genogram.php">ผังครอบครัว</a>
                      </li>
                      <li><a href="#messages">รายงานผล</a>
                      </li>
                    </ul>
                  </div>
  <br>  <br>


<!--start add-->
<div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">เพิ่มสมาชิกในครอบครัว</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
      <form method="post" action="form_genogram.php">
        <div class="row" style="font-size:17px">
            <div class="form-group col-md-12" >
            <div class="form-group col-md-10">
            <label for = "man"></label>เลือกประเภท : &nbsp;&nbsp;
            <input type = "radio" name ="fig" id = "t" value = "1"/> เจ้าของผังเครือญาติ
            <label for = "Lady"></label>&nbsp;&nbsp;
            <input type = "radio" name ="fig" id = "f" value = "0"/> สมาชิก
              </div>
              
            <div class="form-group col-md-10">
          <label for = "man"></label>เพศ : &nbsp;&nbsp;
          <input type = "radio" name ="sex" id = "M" value = "M"/> ชาย
          <label for = "Lady"></label>&nbsp;&nbsp;
          <input type = "radio" name ="sex" id = "F" value = "F"/> หญิง
            </div>
            
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(':radio').click(function(){
               if($('#M').is(":checked")){
                   $( "#hus" ).prop( "disabled", true );
                   $( "#wif" ).prop( "disabled", false );
               }else if($('#F').is(":checked")){
                $( "#wif" ).prop( "disabled", true );
                $( "#hus" ).prop( "disabled", false );
               }
                
                
            });
        </script>
              
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-7 ">
            <label for="recipient-name" class="form-control-label">ชื่อ:</label>
            <input type = "text" class = "form-control" name= "name">
          </div>
          <div class="form-group col-md-3">
            <label for="message-text" class="form-control-label">ปีที่เกิด :</label>
            <select class="form-control" name= "byear">
              <!-- <option></option> -->
              <?php
              for($i=1918; $i<=2018 ;$i++){
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
          $objConnect = mysqli_connect("$servername","$username","$password","$database") or die("Error Connect to Database");
          // $objDB = mysql_select_db("$dbname");
        //   $strSQL = "SELECT * From genogram WHERE wife =''  AND husband ='' AND sex ='M' ";
        $strSQL = "SELECT * From genogram WHERE sex ='M' ";
          $objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]")
          ?>
          <label for="message-text" class="form-control-label">สามี</label>
          <select class="form-control" name= "vir" id="hus">
            <option value="0">(ไม่มี)</option>
            <?php
            while($objResult = mysqli_fetch_array($objQuery)){
            ?>
            <option value="<?php echo $objResult["key_no"];?>"><?php echo $objResult["name"];?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <?php
        mysqli_close($objConnect);
        ?>

        <div class="form-group col-md-2">
         <label>  </label>
         <p> </p>
        <!--<span class="badge badge-secondary">หรือ</span>-->
        <label for="recipient-name" class="form-control-label"></label>
        <button type="button" class="badge badge-secondary">หรือ</button>
        <!-- <input class="btn btn-primary" type="submit" value="หรือ"> -->

          </div>


        <div class="form-group col-md-5">
          <?php
          include "config.php";
          $objConnect = mysqli_connect("$servername","$username","$password","$database") or die("Error Connect to Database");
          // $objDB = mysql_select_db("$dbname");
        //   $strSQL = "SELECT * From genogram WHERE wife = '' AND husband ='' AND sex ='F' ";
        $strSQL = "SELECT * From genogram WHERE sex ='F' ";
          $objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]")
          ?>
          <label for="message-text" class="form-control-label">ภรรยา</label>
          <select class="form-control" name= "ux" id="wif">
            <option value="0">(ไม่มี)</option>
            <?php
            while($objResult = mysqli_fetch_array($objQuery)){
            ?>
            <option value="<?php echo $objResult["key_no"];?>"><?php echo $objResult["name"];?></option>
            <?php
            }
            ?>
          </select>
        </div>

        <?php
        mysqli_close($objConnect);
        ?>

      </div>


      <div class="row">
          <div class="form-group col-md-5">
            <?php
            include "config.php";
            $objConnect = mysqli_connect("$servername","$username","$password","$database") or die("Error Connect to Database");
            // $objDB = mysql_select_db("$dbname");
            // $strSQL = "SELECT * From genogram WHERE sex ='M' AND wife !='' ";
            $strSQL = "SELECT * From genogram WHERE sex ='M'";
            $objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]")
            ?>
            <label for="message-text" class="form-control-label">พ่อ</label>
            <!-- <input type = "number" class = "form-control" name= "fater"> -->

            <select class="form-control" name= "fater">
              <option value="0">(ไม่มี)</option>
              <?php
              while($objResult = mysqli_fetch_array($objQuery)){
              ?>
              <option value="<?php echo $objResult["key_no"];?>"><?php echo $objResult["name"];?></option>
              <?php
              }
              ?>
            </select>

          </div>
          <?php
          mysqli_close($objConnect);
          ?>

          <div class="form-group col-md-5">
            <?php
            include "config.php";
            $objConnect = mysqli_connect("$servername","$username","$password","$database") or die("Error Connect to Database");
            // $objDB = mysql_select_db("$dbname");
            // $strSQL = "SELECT * From genogram WHERE sex ='F' AND husband !='' ";
            $strSQL = "SELECT * From genogram WHERE sex ='F' ";
            $objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]")
            ?>
            <label for="message-text" class="form-control-label">แม่</label>
            <select class="form-control" name= "mom">
              <option value="0">(ไม่มี)</option>
              <?php
              while($objResult = mysqli_fetch_array($objQuery)){
              ?>
              <option value="<?php echo $objResult["key_no"];?>"><?php echo $objResult["name"];?></option>
              <?php
              }
              ?>
            </select>

          </div>

        </div>

        <div class="row">


          </div>


          <?php
          mysqli_close($objConnect);
          ?>

          
          <div class="row" style="font-size:17px">
          

        </div>
          <div class="row" style="font-size:17px">
          <div class="form-group col-md-10">
          <label ></label>เป็นโรคเบาหวานหรือไม่ ? : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type = "radio" name ="dia"  value = "1"/> เป็น
          <label ></label>&nbsp;&nbsp;
          <input type = "radio" name ="dia"  value = "0"/> ไม่เป็น
            </div>

          </div>

          <div class="row" style="font-size:17px">
          <div class="form-group col-md-10">
          <label ></label>เป็นโรคความดันหรือไม่ ? : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type = "radio" name ="hyper" id = "y" value = "1"/> เป็น
          <label ></label>&nbsp;&nbsp;
          <input type = "radio" name ="hyper" id = "n" value = "0"/> ไม่เป็น
            </div>

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
  <!--end model add-->
  


              <!-- Icon Cards-->
            <div class="container">
            <div class="row">

              <!-- <div class="col-md-12">
                <button onclick="load()">Load</button>
              </div> -->
              <br>
                <center>
            <button type="button" class="btn btn-outline btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">
            เพิ่มสมาชิก <i class="fa fa-user-plus"></i>
            </button>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a role="button" class="btn btn-outline btn-warning btn-lg" href="Edit_genogram.php">
              แก้ไขสมาชิก <i class="fa fa fa-edit"></i>
            </a>
          </center>
              <br>

              <!-- /.row -->
              <div class="col-md-12 col-sm-12 ">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="font-size:17px">
                                <!-- <h4>สัญลักษณ์</h4> -->
                                สัญลักษณ์
                            </div>
                            <div class="panel-body">
                              <center><div class="row" style="font-size:16px">
                                <div class="col-lg-2 col-sm-2">
                                  <img class="img-responsive" src="../img/Circle.png" width="52px" height="52px">
                                  <!-- <img src="../img/Circle.png" width="100px" height="100px"> -->
                                  <p>ผู้หญิง</p>
                                </div>

                                <div class="col-lg-2">
                                  <img class="img-responsive" src="../img/Square.png" width="52px" height="52px">
                                  <p>ผู้ชาย</p>
                                </div>

                                <div class="col-lg-3">
                                    <img class="img-responsive" src="../img/fig.jpg" width="110px" height="110px">
                                  <p>เจ้าของผังเครือญาติ</p>
                                </div>

                                <div class="col-lg-3">
                                  <img class="img-responsive" src="../img/blue.png" width="30px" height="30px">
                                  <p>โรคความดันโลหิตสูง</p>
                                </div>

                                <div class="col-lg-2">
                                  <img class="img-responsive" src="../img/red.png" width="30px" height="30px">
                                  <p>โรคเบาหวาน</p>
                                </div>

                              </div></center>
                            </div>

                        </div>
                    </div>


                </div>
                  <div id="myDiagramDiv" style="border: solid 1px black; width:90%; height:550px">

                  </div>
                </div>
              </div>
              <!-- <button id="SaveButton" onclick="save()">Save</button> -->





                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->



        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
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
    
 $('#exampleModal2').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
    })
  </script>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morrisjs/morris.min.js"></script>
    <script src="data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
