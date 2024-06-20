$(document).ready(function() {
    function reloadTable(){
        table.ajax.reload(null, false);
    }

    window.reloadTable = reloadTable;
});
