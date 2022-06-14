<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link href="style.css" rel="stylesheet">
    <style type="text/css">
        /**
*  Nestable css
*/
.dd {
  position: relative;
  display: block;
  margin: 0;
  padding: 0;
  max-width: 600px;
  list-style: none;
  font-size: 13px;
  line-height: 20px;
}

.dd-list {
  display: block;
  position: relative;
  margin: 0;
  padding: 0;
  list-style: none;
}

.dd-list .dd-list {
  padding-left: 30px;
}

.dd-collapsed .dd-list {
  display: none;
}

.dd-item,
.dd-empty,
.dd-placeholder {
  display: block;
  position: relative;
  margin: 0;
  padding: 0;
  min-height: 20px;
  font-size: 13px;
  line-height: 20px;
}

.dd-handle {
  display: block;
  height: 30px;
  margin: 5px 0;
  padding: 5px 10px;
  color: #333;
  text-decoration: none;
  font-weight: bold;
  border: 1px solid #ccc;
  background: #fafafa;
  background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
  background: -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
  background: linear-gradient(top, #fafafa 0%, #eee 100%);
  -webkit-border-radius: 3px;
  border-radius: 3px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
    cursor: move;
    margin: 0 0 10px;
    background: #dbdbdb;
/*    color: #6f6f6f;*/
    padding: 5px 12px
}

.dd-handle:hover {
  color: #2ea8e5;
  background: #fff;
}

.dd-item > button {
/*  display: block;
  position: relative;
  cursor: pointer;
  float: left;
  width: 25px;
  height: 20px;
  margin: 5px 0;
  padding: 0;
  text-indent: 100%;
  white-space: nowrap;
  overflow: hidden;
  border: 0;
  background: transparent;
  font-size: 12px;
  line-height: 1;
  text-align: center;
  font-weight: bold;*/
      position: relative;
    cursor: pointer;
    float: left;
    width: 25px;
    height: 30px;
    margin: 0px 0px;
    padding: 0;
    text-indent: 100%;
    white-space: nowrap;
    overflow: hidden;
    border: 0;
    background: #4CAF50;
    font-size: 12px;
    line-height: 1;
    color: #fff;
    text-align: center;
    font-weight: bold;

}

.dd-item > button:before {
  content: '+';
  display: block;
  position: absolute;
  width: 100%;
  text-align: center;
  text-indent: 0;
}

.dd-item > button[data-action="collapse"]:before {
  content: '-';
}

.dd-placeholder,
.dd-empty {
  margin: 5px 0;
  padding: 0;
  min-height: 30px;
  background: #f2fbff;
  border: 1px dashed #b6bcbf;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}

.dd-empty {
  border: 1px dashed #bbb;
  min-height: 100px;
  background-color: #e5e5e5;
  background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
    -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
  background-image: -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
    -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
  background-image: linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
    linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
  background-size: 60px 60px;
  background-position: 0 0, 30px 30px;
}

.dd-dragel {
  position: absolute;
  pointer-events: none;
  z-index: 9999;
}

.dd-dragel > .dd-item .dd-handle {
  margin-top: 0;
}

.dd-dragel .dd-handle {
  -webkit-box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1);
  box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1);
}

/**
* Nestable Extras
*/
.nestable-lists {
  display: block;
  clear: both;
  padding: 30px 0;
  width: 100%;
  border: 0;
  border-top: 2px solid #ddd;
  border-bottom: 2px solid #ddd;
}

#nestable-menu {
  padding: 0;
  margin: 20px 0;
}

#nestable-output,
#nestable2-output {
  width: 100%;
  height: 7em;
  font-size: 0.75em;
  line-height: 1.333333em;
  font-family: Consolas, monospace;
  padding: 5px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}

#nestable2 .dd-handle {
  color: #fff;
  border: 1px solid #999;
  background: #bbb;
  background: -webkit-linear-gradient(top, #bbb 0%, #999 100%);
  background: -moz-linear-gradient(top, #bbb 0%, #999 100%);
  background: linear-gradient(top, #bbb 0%, #999 100%);
}

#nestable2 .dd-handle:hover {
  background: #bbb;
}

#nestable2 .dd-item > button:before {
  color: #fff;
}

.dd {
  //  float: left;
  //  width: 48 %;
  width: 80%;
}

.dd + .dd {
  margin-left: 2%;
}

.dd-hover > .dd-handle {
  background: #2ea8e5 !important;
}

/**
* Nestable Draggable Handles
*/
.dd3-content {
  display: block;
  height: 30px;
  margin: 5px 0;
  padding: 5px 10px 5px 40px;
  color: #333;
  text-decoration: none;
  font-weight: bold;
  border: 1px solid #ccc;
  background: #fafafa;
  background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
  background: -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
  background: linear-gradient(top, #fafafa 0%, #eee 100%);
  -webkit-border-radius: 3px;
  border-radius: 3px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}

.dd3-content:hover {
  color: #2ea8e5;
  background: #fff;
}

.dd-dragel > .dd3-item > .dd3-content {
  margin: 0;
}

.dd3-item > button {
  margin-left: 30px;
}

.dd3-handle {
  position: absolute;
  margin: 0;
  left: 0;
  top: 0;
  cursor: pointer;
  width: 30px;
  text-indent: 100%;
  white-space: nowrap;
  overflow: hidden;
  border: 1px solid #aaa;
  background: #ddd;
  background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
  background: -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
  background: linear-gradient(top, #ddd 0%, #bbb 100%);
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}

.dd3-handle:before {
  content: '≡';
  display: block;
  position: absolute;
  left: 0;
  top: 3px;
  width: 100%;
  text-align: center;
  text-indent: 0;
  color: #fff;
  font-size: 20px;
  font-weight: normal;
}

.dd3-handle:hover {
  background: #ddd;
}


/*
* Nestable++
*/
.button-delete {
  position: absolute;
  top: 4px;
  right: -26px;
}

.button-edit {
  position: absolute;
  top: 4px;
  right: -52px;
}

#menu-editor {
  margin-top: 40px;
}

#saveButton {
  padding-right: 30px;
  padding-left: 30px;
}

.output-container {
  margin-top: 20px;
}

#json-output {
  margin-top: 20px;
}

    </style>
<body>
    <div class="container" style="background-color: #eee; height: 100vh;">

      <h1 class="text-center">Menu Design</h1>

      <div class="row">
        
        <div class="col-md-3">
          <form class="form-inline" id="menu-add">
            <h3>Add Menu </h3>
            <div class="form-group">
              <label for="addInputName">Name</label>
              <!-- <input type="text" class="form-control" id="addInputName" placeholder="Item name" required> -->
              {!! Form::select('input_name',$data['pages'],'',['class'=>'form-control','id'=>'addInputName']) !!}
            </div>
            <div>&nbsp;</div>
            
                        <div>&nbsp;</div>
            <button class="btn btn-primary" id="addButton"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Item</button>
          </form>
        </div>
        <div class="col-md-9">
          <h3>Menu</h3>
          <div class="dd nestable" id="nestable">
            <ol class="dd-list">

              <!--- Initial Menu Items --->

              <!--- Item1 --->
              <li class="dd-item" data-id="1" data-name="Home" data-slug="home-slug-1" data-new="0" data-deleted="0">
                <div class="dd-handle">Home </div>
                <span class="button-delete btn btn-danger btn-xs pull-right"
                      data-owner-id="1">
                  <i class="fa fa-times" aria-hidden="true"></i>
                </span>
                <span class="button-edit btn btn-success btn-xs pull-right"
                      data-owner-id="1">
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                </span>
              </li>

              <!--- Item2 --->
              <li class="dd-item" data-id="2" data-name="About Us" data-slug="about-slug-2" data-new="0" data-deleted="0">
                <div class="dd-handle">About Us</div>
                <span class="button-delete btn btn-danger btn-xs pull-right"
                      data-owner-id="2">
                  <i class="fa fa-times" aria-hidden="true"></i>
                </span>
                <span class="button-edit btn btn-success btn-xs pull-right"
                      data-owner-id="2">
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                </span>
              </li>

              <!--- Item3 --->
              <li class="dd-item" data-id="3" data-name="Services" data-slug="services-slug-3" data-new="0" data-deleted="0">
                <div class="dd-handle">Services</div>
                <span class="button-delete btn btn-danger btn-xs pull-right"
                      data-owner-id="3">
                  <i class="fa fa-times" aria-hidden="true"></i>
                </span>
                <span class="button-edit btn btn-success btn-xs pull-right"
                      data-owner-id="3">
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                </span>
                <!--- Item3 children --->
                <ol class="dd-list">
                  <!--- Item4 --->
                  <li class="dd-item" data-id="4" data-name="UI/UX Design" data-slug="uiux-slug-4" data-new="0" data-deleted="0">
                    <div class="dd-handle">UI/UX Design</div>
                    <span class="button-delete btn btn-danger btn-xs pull-right"
                          data-owner-id="4">
                      <i class="fa fa-times" aria-hidden="true"></i>
                    </span>
                    <span class="button-edit btn btn-success btn-xs pull-right"
                          data-owner-id="4">
                      <i class="fa fa-pencil" aria-hidden="true"></i>
                    </span>
                  </li>

                  <!--- Item5 --->
                  <li class="dd-item" data-id="5" data-name="Web Design" data-slug="webdesign-slug-5" data-new="0" data-deleted="0">
                    <div class="dd-handle">Web Design </div>
                    <span class="button-delete btn btn-danger btn-xs pull-right"
                          data-owner-id="5">
                      <i class="fa fa-times" aria-hidden="true"></i>
                    </span>
                    <span class="button-edit btn btn-success btn-xs pull-right"
                          data-owner-id="5">
                      <i class="fa fa-pencil" aria-hidden="true"></i>
                    </span>
                  </li>
                  
                </ol>
              </li>
            <li class="dd-item" data-id="6" data-name="Contact Us" data-slug="contact-slug-6" data-new="0" data-deleted="0">
                <div class="dd-handle">Contact Us</div>
                <span class="button-delete btn btn-danger btn-xs pull-right"
                      data-owner-id="6">
                  <i class="fa fa-times" aria-hidden="true"></i>
                </span>
                <span class="button-edit btn btn-success btn-xs pull-right"
                      data-owner-id="6">
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                </span>
              </li>
              <!--------------------------->

            </ol>
          </div>
        </div>
      </div>

      <div class="row output-container">
        <div class="col-md-offset-1 col-md-10">
          <h2 class="text-center">Output:</h2>
          <form class="form">
            <textarea class="form-control" id="json-output" rows="5"></textarea>
          </form>
        </div>
      </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{ $admin_asset_path }}nestable/jquery.nestable.js"></script>
    <script src="./jquery.nestable++.js"></script>
    <script>
$(document).ready(function () {
    var updateOutput = function (e) {
        var list = e.length ? e : $(e.target), output = list.data('output');
        var data = list.nestable('serialize');
        $.ajax({
      url: '{{ route("savemenuitem") }}',
      type:"POST",
      data:{
        'menu_id': '{{ $data["menu"]->id }}',
        'menu_data' : data,
        '_token' : '{{ csrf_token() }}'
      },
      success:function(response){
        hidespinner();
        var newResponse = JSON.parse(response);
        ajaxSuccess(newResponse, '{{ route("currency_settings") }}');
      },
      error: function(response) {
        //ajaxError();
      },
      });
    };

    $('.dd').nestable({
        group: 1,
        maxDepth: 7,
    }).on('change', updateOutput);
});
$("#nestable .button-delete").on("click", deleteFromMenu);
var deleteFromMenu = function () {
  var targetId = $(this).data('owner-id');
  var target = $('[data-id="' + targetId + '"]');

  var result = confirm("Delete " + target.data('name') + " and all its subitems ?");
  if (!result) {
    return;
  }

  // Remove children (if any)
  target.find("li").each(function () {
    deleteFromMenuHelper($(this));
  });

  // Remove parent
  deleteFromMenuHelper(target);

  // update JSON
};
var nestableList = $("#nestable > .dd-list");
var newIdCount = 1;

var addToMenu = function () {
  var newName = $("#addInputName option:selected").text();
  var newSlug = $("#addInputSlug").val();
  var newId = 'new-' + newIdCount;

  nestableList.append(
    '<li class="dd-item" ' +
    'data-id="' + newId + '" ' +
    'data-name="' + newName + '" ' +
    'data-slug="' + newSlug + '" ' +
    'data-new="1" ' +
    'data-deleted="0">' +
    '<div class="dd-handle">' + newName + '</div> ' +
    '<span class="button-delete btn btn-danger btn-xs pull-right" ' +
    'data-owner-id="' + newId + '"> ' +
    '<i class="fa fa-times" aria-hidden="true"></i> ' +
    '</span>' +
    '<span class="button-edit btn btn-success btn-xs pull-right" ' +
    'data-owner-id="' + newId + '">' +
    '<i class="fa fa-pencil" aria-hidden="true"></i>' +
    '</span>' +
    '</li>'
  );

  newIdCount++;

  // update JSON
  //updateOutput($('#nestable').data('output', $('#json-output')));

  // set events
  $("#nestable .button-delete").on("click", deleteFromMenu);
  $("#nestable .button-edit").on("click", prepareEdit);
};
$("#menu-add").submit(function (e) {
    e.preventDefault();
    addToMenu();
  });
</script>
  </body>

    
    
    <!-- <script src="./jquery.nestable++.js"></script> -->
    