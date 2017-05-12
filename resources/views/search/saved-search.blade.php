@extends('layouts.main')
@section('content')
<div class="content-wrapper-inner">
    <div class="content-wrapper-settings search-menu">
        @include('search.search-tabs')
        <div class="address-update-container">
            <div class="address-update-inner">
                <div>
                    <h1>Saved Searches</h1>
                </div>
            </div>
            
            <div class="address-update-heading">
                <h1>You have <?php echo $cnt ?> saved searches</h1>
            </div>
         <div >
             <table>
                 @foreach($search_row as $search_data)
                 <tr>
                     <td>{{$search_data->search_name}}</td>
                 <td><a href="{{url('users/listing')}}">Run</a></td>
                     <td><a href="{{url('search/rename').'/'.$search_data->search_id}}"  class="rename-confirm">Rename</a></td>
                     <td><a href="{{url('search/edit-search').'/'.$search_data->search_id}}">Edit</a></td>
                     <td><a href="{{url('search/delete').'/'.$search_data->search_id}}"  class="delete-confirm">Delete</a></td>
                 </tr>
                 @endforeach
             </table>
                
            </div>
            <div class="text-center button mr-t-20 mr-b-20">
                        
	<span class="greyShinyButton"><a href="{{url('search/add-search')}}" style="color:#fff">Create a new saved search</a></span>
                        
                    </div>
        </div>
    </div>
</div>
@section('script')
<script>
    $(".delete-confirm").click(function(e) {
    if (!confirm("Are you sure you want to permanently delete the saved search ? "))
        e.preventDefault();
});
    </script>
@endsection
@endsection
        