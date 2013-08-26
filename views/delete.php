<script>
        
    var qs = (function(a) {
        if (a == "") return {};
        var b = {};
        for (var i = 0; i < a.length; ++i)
        {
            var p=a[i].split('=');
            if (p.length != 2) continue;
            b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
        }
        return b;
    })(window.location.search.substr(1).split('&'));    
    
    if (qs["id"] != "undefined" || qs["name"] != "undefined") {
        var id = qs["id"];
        var name = qs["name"];  
        
        localStorage.setItem("deleteName", name);
        localStorage.setItem("deleteId", id);
    };
    
</script> 

<div class="container">    
    <div class="row">
        <div class="span12">
            <ul class="breadcrumb">
              <li><a href="/">Home</a> <span class="divider">/</span></li>            
              <li class="active"><b>Delete a Message</b></li>
            </ul>
        </div>
    </div>
</div>

<div class="container"> 
    <div class="row">
        <div class="span12">

            <form class="form-horizontal">
            <fieldset>

            <!-- Form Name -->
            <legend>Delete a Message</legend>

            <!-- Text input-->
            <div class="control-group">
              <label class="control-label"></label>
              <div class="controls">
                <p>Are you sure you would like to delete the <b>
                <script>
                    var deleteName = localStorage.getItem("deleteName");
                    document.write(deleteName);             
                </script> 
                </b> message?</p>       
              </div>
            </div>          
            
            <!-- Button -->
            <div class="control-group">
              <label class="control-label"></label>
              <div class="controls">
                <button id="btnCancel" name="btnCancel" class="btn">Cancel</button>
                <button id="btnDelete" name="btnDelete" class="btn btn-danger">Delete</button>
              </div>
            </div>

            </fieldset>
            </form>
        </div>
    </div>
</div>

<script src="/js/delete.js"></script>
