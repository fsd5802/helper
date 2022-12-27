
@if($name && $value)

<a href="{{getRoute($name.'.show',$value->id    )}}" class="btn btn-sm btn-clean
btn-icon mr-2" title="@lang('general.show')">
    <i class="fa fa-eye"></i>
</a>

@if (!request()->routeIs('applications.*','service-requests.*','quotations.*'))
<a href="{{getRoute($name.'.edit',$value->id)}}" class="btn btn-sm btn-clean
btn-icon mr-2 custimizeEditBtn" title="@lang('general.edit')">
    <i class="fa fa-edit"></i>
</a>
@endif


<form id="delete-form-{{ $value->id }}" style="display: inline-table;" action="{{ getRoute($name.'.destroy',$value->id) }}"
    method="post">
    @csrf
    @method('delete')
    <button type="button" class="btn btn-sm btn-clean btn-icon custimizeDelBtn"
            title="@lang('general.delete')" onclick="confirmDelete
    ('delete-form-{{ $value->id }}')">
        <i class="fa fa-trash"></i>
    </button>
</form>
@endif


