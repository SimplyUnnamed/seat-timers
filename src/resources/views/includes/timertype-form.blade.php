<div class="card card-default" id="Add-Timer">
    <form id="add-timer" enctype="multipart/form-data" method="post" action="{{route('timertypes.store')}}">
        <div class="card-header">
            <h3 class="card-title">
                Add Timer Type
            </h3>
        </div>

        <div class="card-body">

            {{csrf_field()}}

            {{method_field('PUT')}}


            <div class="form-group row">
                <label for="type-label" class="col-form-label col-md-4" >Label</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="label" id="type-label"/>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <div class="btn-group float-right">
                <button type="submit" class="btn btn-primary">Add Time Type</button>
            </div>
        </div>
    </form>
</div>
