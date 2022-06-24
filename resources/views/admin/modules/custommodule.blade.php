
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>GrapesJS Preset Webpage</title>
    <script src="{{$admin_asset_path}}js/own.js"></script>

    <link href="{{$admin_asset_path}}css/own.css?sad=sadsad" rel="stylesheet">

    <link href="https://unpkg.com/grapesjs/dist/css/grapes.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <!-- <link href="{{ $admin_asset_path }}website-builder/dist/grapesjs-preset-webpage.min.css" rel="stylesheet">

    <script src="//feather.aviary.com/imaging/v3/editor.js"></script>

    <script src="https://static.filestackapi.com/v3/filestack-0.1.10.js"></script> -->
<!-- <script src="{{$admin_asset_path}}website-builder/grapesjs-dev/dist/grapes.min.js"></script> -->
<script src="{{$admin_asset_path}}website-builder/dist/grapes.min.js"></script>
    <!-- <script src="https://unpkg.com/grapesjs"></script> -->

    <script src="{{ $admin_asset_path }}website-builder/dist/grapesjs-preset-webpage.min.js"></script>

    <!-- <script src="https://unpkg.com/grapesjs-lory-slider"></script>

    <script src="https://unpkg.com/grapesjs-plugin-toolbox"></script>  -->

    <script src="{{ $admin_asset_path }}website-builder/plugin/dist/grapesjs-blocks-bootstrap4.min.js"></script>

     <script src="https://grapesjs.com/js/grapesjs-custom-code.min.js?0.1.2"></script>
    <style>
      body,
      html {
        height: 100%;
        margin: 0;
      }
    </style>
  </head>
  <body>

    <div id="gjs" style="height:0px; overflow:hidden">
      <div class="panel">
        <h1 class="welcome">Welcome to</h1>
        <div class="big-title">
          
          <span>{{ config('app.name', 'Laravel') }}</span>
        </div>
        <div class="description">
          This is a demo content from index.html. For the development, you shouldn't edit this file, instead you can
          copy and rename it to _index.html, on next server start the new file will be served, and it will be ignored by git.
        </div>
      </div>
      <style>
        .panel {
          width: 90%;
          max-width: 700px;
          border-radius: 3px;
          padding: 30px 20px;
          margin: 150px auto 0px;
          background-color: #d983a6;
          box-shadow: 0px 3px 10px 0px rgba(0,0,0,0.25);
          color:rgba(255,255,255,0.75);
          font: caption;
          font-weight: 100;
        }

        .welcome {
          text-align: center;
          font-weight: 100;
          margin: 0px;
        }

        .logo {
          width: 70px;
          height: 70px;
          vertical-align: middle;
        }

        .logo path {
          pointer-events: none;
          fill: none;
          stroke-linecap: round;
          stroke-width: 7;
          stroke: #fff
        }

        .big-title {
          text-align: center;
          font-size: 3.5rem;
          margin: 15px 0;
        }

        .description {
          text-align: justify;
          font-size: 1rem;
          line-height: 1.5rem;
        }
      </style>
    </div>

<div id="toast">
  <div id="desc" class="toastDesc">A notification message..</div>
</div>
   </div><!-- /#right-panel -->
    <script type="text/javascript">
      var editor = grapesjs.init({
        height: '100%',
        showOffsets: 1,
        noticeOnUnload: 1,
        storageManager: {
    type: 'remote',
    stepsBeforeSave: 1,
    autosave: true,         // Store data automatically
    autoload: true,
    urlStore: '{{ route("autosavecustommodule",(isset($data["module"]["id"]))?$data["module"]["id"]:"") }}',
    urlLoad: '{{ route("autoloadcustommodule",(isset($data["module"]["id"]))?$data["module"]["id"]:"") }}',
     ContentType: 'application/json',
    // For custom parameters/headers on requests
    params: { "_token": '{{ csrf_token() }}','module_id' : '{{ (isset($data["module"]["id"]))?$data["module"]["id"]:"" }}' },
    contentTypeJson: true,
      storeComponents: true,
    storeStyles: true,
    storeHtml: true,
    storeCss: true,
     headers: {
    'Content-Type': 'application/json'
    },
    json_encode:{
    "gjs-html": [],
    "gjs-css": [],
    }
  //headers: { Authorization: 'Basic ...' },
  },
        container: '#gjs',
        fromElement: true,
        assetManager :{
          upload: '{{ route("upload_files_grapes") }}',
          autoAdd : 1,
        },
        plugins: ['gjs-preset-webpage','grapesjs-blocks-bootstrap4','grapesjs-custom-code'],
        pluginsOpts: {
          'gjs-preset-webpage' :{},
        'grapesjs-blocks-bootstrap4': {
          blocks: {
            // ...
          },
          blockCategories: {
            // ...
          },
          labels: {
            // ...
          },
          // ...
        }
      },
        canvas: {
        styles: [
          'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css',
          ''
         
        ],
        scripts: [
          'https://code.jquery.com/jquery-3.3.1.slim.min.js',
          'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js',
          'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'
        ],
      }
      });
      editor.Panels.addButton
      ('options',
        [{
          id: 'save-db',
          className: 'fa fa-floppy-o',
          command: 'save-db',
          attributes: {title: 'Publish This Page'}
        },{
          id: 'restore-default',
          className: 'fa fa-recycle',
          command: 'restore-default',
          attributes: {title: 'Restore Default Settings'}
        }
        ]
      );

      editor.Commands.add
    ('save-db',
    {
        run: function(editor, sender)
        {
          sender && sender.set('active', 0); // turn off the button
          //editor.store();
          var htmldata = editor.getHtml();
          var cssdata = editor.getCss();
          var compoData = editor.getComponents();
          /*console.log(editor.getStyle());
          console.log(cssdata);*/
          $.ajax({
            type:"post",
            dataType:"json",
            url: "{{ route("autosavecustommodule",(isset($data["module"]["id"]))?$data["module"]["id"]:"") }}",
            data: {
              'gjs-html': htmldata,
              'gjs-css': cssdata,
              'module_id' : '{{ (isset($data["module"]["id"]))?$data["module"]["id"]:"" }}',
              '_token' : '{{ csrf_token()}}'
          },
            success: function(data) {
              //var newResponse = JSON.parse(data);
                ajaxSuccess(data, '');
            },
            error: function(data) {
                alert('Server Error, Please try again');
            },
        });
        }
    });
    editor.Commands.add
    ('restore-default',
    {
        run: function(editor, sender)
        {
          sender && sender.set('active', 0); // turn off the button
          editor.store();
          var htmldata = editor.getHtml();
          var cssdata = editor.getCss();
          $.ajax({
            type:"get",
            dataType:"json",
            url: "{{ route("autoloadcustommodule",(isset($data["module"]["id"]))?$data["module"]["id"]:"") }}",
            data: {
              html: htmldata,
              css: cssdata,
              'restore' : true
          },
            success: function(data) {
                $('#toast').addClass('show');
                $('.toastDesc').html("Module data rstored to factory settings!");
                setTimeout(function(){ 
                $('#toast').addClass('').removeClass('show');
                location.reload();
                }, 1500);
            },
            error: function(data) {
                alert('Server Error, Please try again');
            },
        });
        }
    });
    editor.Panels.removeButton('options', 'undo');

      const am = editor.AssetManager;
      am.getConfig().params = {'_token':'{{ csrf_token() }}'};
    </script>
  </body>
</html>
