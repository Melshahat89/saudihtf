
{{--<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.css">--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}

{{--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

{{ Html::script('website/js/admin/jquery.dataTables.min.js') }}
<script src="{{ url('website') }}/js/dataTables.bootstrap4.js"></script>


<script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="{{ url('/') }}/website/datatables/buttons.server-side.js"></script>
<script src="{{ url('/') }}/website/datatables/responsive/js/dataTables.responsive.js"></script>
<script src="{{ url('/') }}/website/datatables/responsive/js/responsive.bootstrap.js"></script>

{!! $dataTable->scripts() !!}