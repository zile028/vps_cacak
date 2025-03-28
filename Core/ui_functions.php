<?php

function updateSingle($action, $name, $value, $type = "text")
{
    echo "
    <form action='$action' class='d-flex' method='post'>
        <input type='hidden' name='_method' value='patch'>
        <input style='' class='form-control' type='$type' name='$name' value='$value'>
        <button class='btn btn-sm btn-primary' type='submit'><i class='mdi mdi-check'></i></button>
    </form>
    ";
}

function updateSelect($action, $name, $value = [], $selected = null): void
{
    $html = "
    <form action='$action' class='d-flex w-100' method='post'>
        <input type='hidden' name='_method' value='patch'>
        <select class='form-control' name='$name'>";
    foreach ($value as $key => $caption) {
        $current = $key === $selected ? "selected" : "";
        $html .= "<option $current value='$key' >$caption</option>";
    }
    $html .= "
        </select>
        <button class='btn btn-sm btn-primary' type='submit'><i class='mdi mdi-check'></i></button>
    </form>";
    echo $html;
}

function updatePriority($action, $value)
{
    echo "
    <form action='$action' class='d-flex' method='post'>
    <input type='hidden' name='_method' value='patch'>
    <input style='width: 60px;' class='form-control' type='number' name='prioritet' min='0' 
    value='$value'>
    <button class='btn btn-sm btn-primary' type='submit'><i class='mdi mdi-check'></i></button>
    </form>
    ";
}

function deleteForm($action)
{
    echo "
    <form action='$action' method='post'>
        <input type='hidden' name='_method' value='delete'>
        <button class='btn btn-sm btn-danger'><i class='mdi mdi-delete'></i></button>
    </form>
    ";
}

function deleteFormTable($action)
{
    return "
    <form action='$action' method='post'>
        <input type='hidden' name='_method' value='delete'>
        <button class='btn btn btn-danger'><i class='mdi mdi-delete'></i></button>
    </form>
    ";
}

function buildMenuTable(array $elements, $parents): string
{
    $branch = "";
    foreach ($elements as $element) {
        $indent = ($element["level"] - 0.3) * 15;
        $isDrop = $element['drop'] ? "checked" : "";
        $parentsSelect = "<select class='form-control' name='parent' id='parent'>
                            <option value='null'>No parent</option>";
        $deleteBtn = deleteFormTable("/dashboard/navbar/" . $element["id"]);
        foreach ($parents as $parent):
            $isSelected = $parent["id"] === $element["parent"] ? "selected" : null;
            $to = $parent["to"] ? " - " . $parent["to"] : "";
            $parentsSelect .= "<option value='{$parent["id"]}' {$isSelected}>
                            {$parent["caption"]} {$to}
                        </option>";
        endforeach;
        $parentsSelect .= "</select>";
        $branch .= "
                        <tr>
                    <form action='/dashboard/navbar/{$element["id"]}' method='post' class='row'>
                            <td class='col-4'>
                            <input class='form-control' style='padding-left: {$indent}px' type='text' value='{$element['caption']}' name='caption'>
                            </td>
                            <td class='col-3'>
                            {$parentsSelect}
                            </td>
                            <td class='col-3'>
                            <input class='form-control' type='text' value='{$element['to']}' name='to'>
                            </td>
                            <td class='col'>
                            <input class='form-check-input rounded-pill ms-0 form-control w-100 mt-0' type='checkbox' role='switch' name='drop' {$isDrop} >
                            </td>
                            <td class='col-1'>
                            <input class='form-control' type='number' min='1' value='{$element['level']}' name='level'>
                            </td>
                            <td class='col-1'>
                            <input class='form-control' type='number' min='1' value='{$element['position']}' name='position'>
                            </td>
                            <td>
                            <button class='btn btn-primary'>Update</button>
                            </td>
                    </form>
                    <td>
                    {$deleteBtn}
                    </td>
                        </tr>
                    ";
        if (isset($element["submenu"])) {

            $child = buildMenuTable($element["submenu"], $parents);
            if ($child) {
                $branch .= $child;
            }
        }
    }

    return $branch;
}

function datalist($items, $id)
{
    $html = "<datalist id='{$id}'>";
    foreach ($items as $value):
        $html .= "<option value='{$value}'>";
    endforeach;
    $html .= "</datalist>";
    echo $html;
}