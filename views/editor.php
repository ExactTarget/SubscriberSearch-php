<div class="container">    
    <div class="row">
        <div class="span12">
            <ul class="breadcrumb">
              <li><a href="/">Home</a> <span class="divider">/</span></li>            
              <li class="active"><b>Message Editor</b></li>
            </ul>
        </div>
    </div>
</div>

<div class="container">    
    <div class="row">
        <div class="span12">
            <div class="alert alert-success" id="alertSaved" hidden="true">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Saved</strong> Your message has been saved!
            </div>
        </div>
    </div>
    <div class="row">       
        <div class="span12">
            <p>
                <h1>Message Editor
                <button id="btnValidate" name="btnValidate" class="btn pull-right" style="margin: 2px 2px 2px 2px;">Validate</button>
                <button id="btnPreview" name="btnPreview" class="btn pull-right" style="margin: 2px 2px 2px 2px;">Preview</button>
                <button id="btnTestSend" name="btnTestSend" class="btn pull-right" style="margin: 2px 2px 2px 2px;">Test Send</button>
                <button id="btnSave" name="btnSave" class="btn pull-right" style="margin: 2px 2px 2px 2px;">Save</button>
                </h1>
            </p>
            <!-- editor -->
            <div id="example"></div>
        </div>
    </div>
</div>

<script src="/js/editor.js"></script>
