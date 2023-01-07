@if($status === 'draft')
    <span class="p-2 badge badge-warning px-2 py-1" >{{__('Draft')}}</span>
@elseif($status === 'archive')
    <span class="p-2 badge badge-warning" >{{__('Archive')}}</span>
@elseif($status === 'banned')
    <span class="p-2 badge badge-danger" >{{__('Banned')}}</span>
@elseif($status === 'pending')
    <span class="p-2 badge badge-warning" >{{__('Pending')}}</span>
@elseif($status === 'complete')
    <span class="p-2 badge badge-success" >{{__('Complete')}}</span>
@elseif($status === 'close')
    <span class="p-2 badge badge-danger" >{{__('Close')}}</span>
@elseif($status === 'in_progress')
    <span class="p-2 badge badge-info" >{{__('In Progress')}}</span>
@elseif($status === 'publish')
    <span class="p-2 badge badge-primary px-2 py-1" >{{__('Published')}}</span>
@elseif($status === 'approved')
    <span class="p-2 badge badge-success" >{{__('Approved')}}</span>
@elseif($status === 'confirm')
    <span class="p-2 badge badge-success" >{{__('Confirm')}}</span>
@elseif($status === 'yes')
    <span class="p-2 badge badge-success" >{{__('Yes')}}</span>
@elseif($status === 'no')
    <span class="p-2 badge badge-danger" >{{__('No')}}</span>
@elseif($status === 'cancel')
    <span class="p-2 badge badge-danger" >{{__('Cancel')}}</span>
@elseif($status === 'reject')
    <span class="p-2 badge badge-danger" >{{__('Reject')}}</span>
@elseif($status === 'pending')
    <span class="p-2 badge badge-warning" >{{__('Pending')}}</span>
@elseif($status == 1)
    <span class="p-2 badge badge-info" >{{__('Active')}}</span>
@elseif($status == 0)
    <span class="p-2 badge badge-danger" >{{__('Inactive')}}</span>
@endif