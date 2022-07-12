<style>
    .pagination>.page-item.active>a {
        background-color: #e91e63;
    }
</style>
<?php

function dataTableInit($id, $data)
{
    echo '<div class="material-datatables">
    <table id="' . $id . '" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">';
    tableHeader($data);
    tableBody($data);
    echo '</table>
    </div>
    <script>dataTableInit(' . $id . ')</script>';
}

function tableHeader($header)
{
    echo '<thead>
    <tr>';
    foreach ($header[0] as $key => $value) {
        echo '<th>' . $key . '</th>';
    }
    echo '<th class="disabled-sorting text-center">Actions</th>
    </tr>
    </thead>
    <tfoot>
    <tr>';
    foreach ($header[0] as $key => $value) {
        echo '<th>' . $key . '</th>';
    }
    echo '<th class="disabled-sorting text-center">Actions</th>
    </tr>
    </tfoot>';
}

function tableBody($data)
{
    echo '<tbody>';
    foreach ($data as $row) {
        echo '<tr>';
        foreach ($row as $key => $value) {
            echo '<td>' . $value . '</td>';
        }
        echo '<td class="text-center">
        <a class="btn btn-link btn-info btn-just-icon editBtn"><i class="material-icons">edit</i></a>
        <a class="btn btn-link btn-danger btn-just-icon delBtn"><i class="material-icons">close</i></a>
        </td>
        </tr>';
    }
    echo '</tbody>';
}

?>
<script>
    function dataTableInit(id) {
        $(document).ready(function() {
            $(`#${id.id}`).DataTable();
        });
    }
</script>