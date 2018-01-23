<div id="mymodal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add New Tag</h4>
            </div>
            <form class="tagForm" id="tag-form" action="{{ path('addTag') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <label for="tagName">Tag Name: </label>
                    <input id="tagName" class="form-control" type="text"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input id="tag-form-submit" type="submit" class="btn btn-primary" value="Add Tag">
                </div>
            </form>
        </div>
    </div>
</div>
