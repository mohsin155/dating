<div id="leftbar"> 
    <div id="mailnav">   
        <ul>
            <li>
                <a href="{{url('message/inbox')}}" id="inbox-icon" class="firstnav">Inbox ({{getInboxTotal()}})</a>
            </li>
            <li>
                <a href="{{url('message/inbox/?favourites=1')}}" id="favorites-icon"><span>Favorites</span></a>
            </li>
            <?php $folders = getFolderList();?>
            @foreach($folders as $row)
            <li>
                <a href="{{url('message/inbox/'.$row->folder_id)}}" id="favorites-icon"><span>&nbsp;{{$row->folder_name}}</span></a>
            </li>
            @endforeach
            <li>
                <a href="javascript:void(0);" class="new-folder-icon" id="createNewFolder" data-toggle="modal" data-target="#myModal">New Folder</a>
            </li>
            <li><a href="{{url('message/sent/')}}" id="sent-icon">Sent</a></li>
            <li><a href="{{url('message/trash/')}}" id="trash-icon">Trash</a></li>
            <!--<li><a href="#" id="mail-filtered-icon" class="lastnav">Create Filter</a></li>-->
        </ul>
    </div>     
</div> 

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Folder</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('message/create-folder')}}">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="text" name="folder_name" />
                <input type="submit" value="Submit" />
                </form>
            </div>
        </div>
    </div>
</div>