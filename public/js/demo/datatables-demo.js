// Call the dataTables jQuery plugin
$(document).ready(function () {
  $("#dataTable").DataTable({
    dom: '<"row"<"col-md-6"l><"col-md-6 custom-search"f>>rtip',
  });
});
