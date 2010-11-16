<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html dir="ltr">
    
    <head>
        <style type="text/css">
            body, html { font-family:helvetica,arial,sans-serif; font-size:90%; }
        </style>
        <script src="<?php echo base_url();?>assets/js/dojo/dojo/dojo.js"
        djConfig="parseOnLoad: true">
        </script>
        <script type="text/javascript">
            dojo.require("dijit.layout.ContentPane");
            dojo.require("dijit.layout.BorderContainer");
            dojo.require("dijit.layout.TabContainer");
            dojo.require("dijit.layout.AccordionContainer");
        </script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/dojo/dijit/themes/claro/claro.css"
        />
        <style type="text/css">
            html, body { width: 100%; height: 100%; margin: 0; overflow:hidden; }
            #borderContainerTwo { width: 100%; height: 100%; }
        </style>
    </head>
    
    <body class=" claro ">
        <div dojoType="dijit.layout.BorderContainer" gutters="true" id="borderContainerTwo">
            <div dojoType="dijit.layout.ContentPane" region="top" splitter="false" style="height:60px;background-color:#EEEEEE">
               <H1>NEAT Project</H1>
            </div>
            <div dojoType="dijit.layout.BorderContainer" liveSplitters="true" design="sidebar"
            region="center" id="mainSplit" style="background-color:#EEEEEE">
                <div dojoType="dijit.layout.AccordionContainer" minSize="50" style="width: 300px;"
                id="leftAccordion" region="leading" splitter="true">
                    <div dojoType="dijit.layout.AccordionPane" title="Projects">
                    </div>
                    <div dojoType="dijit.layout.AccordionPane" title="Another one">
                    </div>
                    <div dojoType="dijit.layout.AccordionPane" title="Even more fancy" selected="true">
                    </div>
                    <div dojoType="dijit.layout.AccordionPane" title="Last, but not least">
                    </div>
                </div>
                <!-- end AccordionContainer -->
                <div dojoType="dijit.layout.TabContainer" region="center" tabStrip="true">
                    <div dojoType="dijit.layout.ContentPane" title="My first tab" selected="true">
                        Lorem ipsum and all around...
                    </div>
                    <div dojoType="dijit.layout.ContentPane" title="My second tab">
                        Lorem ipsum and all around - second...
                    </div>
                    <div dojoType="dijit.layout.ContentPane" title="My last tab" closable="true">
                        Lorem ipsum and all around - last...
                    </div>
                </div>
            </div>
        </div>
        <!-- NOTE: the following script tag is not intended for usage in real
        world!! it is part of the CodeGlass and you should just remove it when
        you use the code -->
        <script type="text/javascript">
            dojo.addOnLoad(function() {
                if (document.pub) {
                    document.pub();
                }
            });
        </script>
    </body>

</html>