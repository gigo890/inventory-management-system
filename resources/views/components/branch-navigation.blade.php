
<select name="branch" id="branch-select" onchange="SelectChange(this)"class="font-semibold text-xl leading-tight bg-gray-800 border-0">
    @foreach($branches as $selectbranch)
    <option value="{{ $selectbranch->id }}"@if($selectbranch == $branch) selected="selected"@endif>Branch-{{ $selectbranch->id }} {{ $selectbranch->name }}</option>
    @endforeach
</select>
<div class="inline pt-6 divide-x-2 divide-solid divide-white">
    <a href="{{ route('branch.report', $branch->id) }}" class="px-3">Performance</a>
    <a href="{{ route('branch.show', $branch->id) }}" class="px-3">Stock</a>
    <a href="{{ route('branch.sales', $branch->id) }}" class="px-3">Sales</a>
</div>

<script>
    var branch_id = document.getElementById('branch-select').value;
    var route = "{{ route('branch.report', ':id') }}"
   function SelectChange(select){
       branch_id = select.value;
       route = route.replace(':id',parseInt(branch_id));
       window.location.href = route;
   }
</script>
