<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>AchieveCraft - Make Minecraft achievement images</title>

    <!-- CSS  -->
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <meta name="keywords" content="achievecraft,minecraft achievement,minecraft achievement generator,jdf2,jared,hug">
    <meta name="author" content="Jared (jdf2)">
    <meta name="description" content="Make custom Minecraft Achievements with Achievecraft!">

    <style>
        .icon-block {
            padding: 0 15px;
        }
        .icon-block .material-icons {
            font-size: inherit;
        }


        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }

        .icon-preview{
            width: 32px;
            height: 32px;
            padding-left: 2px;
            float: left;
        }
    </style>
</head>
<body>
<nav class="lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">AchieveCraft</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="https://github.com/jdf221/AchieveCraft">GitHub</a></li>
        </ul>

        <ul id="nav-mobile" class="side-nav">
            <li><a href="https://github.com/jdf221/AchieveCraft">GitHub</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <h3 class="header center" style="color: #ee6e73;">Custom Minecraft Achievements</h3>
        <div class="row center">
            <h5 class="header col s12 light">This is a remake of achievecraft.com, all old links work just by changing the .com to a .net!</h5>

            <p class="s12 light">Avatars now redirect to <a href="http://mc-heads.net">mc-heads.net</a></p>
        </div>
        <br><br>

    </div>
</div>

<div class="container">
    <div class="section">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- AchieveCraft Top (Responsive) -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-1506766466017735"
             data-ad-slot="1336105404"
             data-ad-format="auto"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>

    <div class="section">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 m4">
                <div class="icon-block">
                    <h5 class="center">Add some text</h5>

                    <p class="light">
                    <div class="input-field col" style="width: 100%;">
                        <input class="TextSetter topText" placeholder="Achievement Get" id="topText" type="text">
                        <label for="topText">Top text</label>
                    </div>

                    <div class="input-field col" style="width: 100%;">
                        <input class="TextSetter bottomText" placeholder="Placeholder" id="bottomText" type="text">
                        <label for="bottomText">Bottom Text</label>
                    </div>
                    </p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h5 class="center">Find some icons</h5>
                    <!--<p class="center"><a class="waves-effect waves-light btn modal-trigger" href="#uploadIcon">upload a
                            custom icon</a></p>-->

                    <p class="light">
                    <div class="input-field col" style="width: 100%;">
                        <select class="IconSelector list groups" id="iconGroupSelect">
                        </select>
                        <label>Choose an icon group</label>
                    </div>

                    Custom icon upload has been removed but will be back soon.

                    </p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h5 class="center">Choose an icon</h5>

                    <p class="light">
                        <div class="IconSelector list icons" style="overflow-y: auto; height: 150px;">

                    </div>
                    </p>
                </div>
            </div>
        </div>

    </div>

    <div class="section">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 m4">
                <div class="icon-block">
                    <h5 class="center">Preview</h5>

                    <p class="light">
                        <img class="Preview image" src="https://achievecraft.net/i/19.1/Achievement%20Get/Make%20an%20Achievement!" width="110%">
                    </p>

                    <!--<p class=" light">Click the text boxes to copy it to your clipboard.</p>-->
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h5 class="center">Links</h5>
                    <p class="center">
                    <div class="row">
                    <!--<div class="input-field col s12">
                        <input class="clickToCopy Preview link short" data-clipboard-text="if you see this something went wrong" id="shortLink" placeholder="Click to generate" type="text">
                        <label for="shortLink">Short Link</label>
                    </div>-->

                    <div class="input-field col s12">
                        <input class="clickToCopy Preview link direct" onclick="this.setSelectionRange(0, this.value.length)" data-clipboard-text="if you see this something went wrong" id="directLink" type="text">
                        <label for="directLink">Direct Link</label>
                    </div>
                        </div>
                    </p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h5 class="center">Codes</h5>

                    <p class="center">
                    <div class="row">
                        <div class="input-field col s12">
                            <input class="clickToCopy Preview code bb" onclick="this.setSelectionRange(0, this.value.length)" data-clipboard-text="if you see this something went wrong" id="bbCode" type="text">
                            <label for="bbCode">Forum (BB) Code</label>
                        </div>

                        <div class="input-field col s12">
                            <input class="clickToCopy Preview code html" onclick="this.setSelectionRange(0, this.value.length)" data-clipboard-text="if you see this something went wrong" id="htmlCode" type="text">
                            <label for="htmlCode">HTML Code</label>
                        </div>
                    </div>
                    </p>
                </div>
            </div>
        </div>

    </div>

    <div class="section">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- AchieveCraft Bottom (Responsive) -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-1506766466017735"
             data-ad-slot="2812838600"
             data-ad-format="auto"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
</div>

<div id="uploadIcon" class="modal">
    <form class="uploadIconForm" action="api/new/icon" method="POST" enctype="multipart/form-data">
        <div class="modal-content">
            <h4>Upload custom icon(s)</h4>
            <p>
            <div class="file-field input-field">
                <div class="btn">
                    <span>Choose a File</span>
                    <input type="file" name="icons[]" multiple>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path" type="text" placeholder="Upload one or more files">
                </div>
            </div>

            <div class="input-field col">
                <input id="iconGroupName" name="groupName" type="text" placeholder="Unnamed Icon Group">
                <label for="iconGroupName">Icon Group Name (Optional)</label>
            </div>
            </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</button>
            <button type="submit" class="modal-action waves-effect waves-green btn-flat">Upload</button>
        </div>
    </form>
</div>

<footer class="page-footer">
    <div class="footer-copyright">
        <div class="container">
            Made by <a class="orange-text text-lighten-3" href="https://twitter.com/jdf221">Jared</a>. Using <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>.
        </div>
    </div>
</footer>


<!--  Scripts-->
<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.min.js"></script>
<script src="js/clipboard.min.js"></script>
<script src="js/init.js"></script>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    if(document.domain == "dev.achievecraft.net"){
        ga('create', 'UA-72185269-2', 'auto');
    }
    else{
        ga('create', 'UA-72185269-1', 'auto');
    }
    ga('send', 'pageview');

</script>

</body>
</html>