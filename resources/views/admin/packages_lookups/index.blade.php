@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Packages </h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('packagesLookups.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('admin.packages_lookups.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection
@section('page-script')
<script type="text/javascript">
    $(document).ready(function(){
    $('#packagesLookups-table').DataTable({
        "pageLength": 10,
        dom: 'Bfrtip',
        columnDefs: [{
           targets:3,
           render: function(data, type, full, meta){
              if(type === 'display'){
                 data = data + '<div class="links">' +'</div>';                     
              }
               
              return data;
           }
        }],  
        buttons: [
            
        ]
    });

    var searchInput= FindByAttributeValue('type','search','input');
    searchInput.setAttribute("placeholder", "Enter search keyword here...");

});

        function FindByAttributeValue(attribute, value, element_type)    {
        element_type = element_type || "*";
        var All = document.getElementsByTagName(element_type);
        for (var i = 0; i < All.length; i++)       {
            if (All[i].getAttribute(attribute) == value) { return All[i]; }
        }
        }

 </script>
@endsection
