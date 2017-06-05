<div id="leftbar"> 
    <div id="mailnav">   
        <ul>
            <li>
                <a href="#" id="inbox-icon" class="firstnav">Inbox ({{getInboxTotal()}})</a>
            </li>
            <li>
                <a href="#" id="favorites-icon"><span>Favorites</span></a>
            </li>
            <?php $folders = getFolderList();?>
            @foreach($folders as $row)
            <li>
                <a href="#" id="favorites-icon"><span>&nbsp;{{$row->folder_name}}</span></a>
            </li>
            @endforeach
            <li>
                <a href="javascript:void(0);" class="new-folder-icon" id="createNewFolder" data-toggle="modal" data-target="#myModal">New Folder</a>
            </li>
            <li><a href="#" id="sent-icon">Sent</a></li>
            <li><a href="#" id="trash-icon">Trash</a></li>
            <li><a href="#" id="mail-filtered-icon" class="lastnav">Create Filter</a></li>
        </ul>
    </div>     
</div> 