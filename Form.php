<?php
class Form {
    var $fields = array();  // Menyimpan field-form
    var $action;
    var $submit = "";
    var $jumField = 0;

    // Konstruktor untuk menetapkan action dan submit button label
    function __construct($action, $submit) {
        $this->action = $action;
        $this->submit = $submit;
    }

    // Menampilkan form
    function displayForm() {
        echo "<form action='" . $this->action . "' method='post'>";
        echo "<table width='100%'>";
        
        // Loop untuk menampilkan field-form
        for ($i = 0; $i < $this->jumField; $i++) {
            echo "<tr><td align='right'>" . $this->fields[$i]['label'] . "</td>";
            
            // Memproses tiap tipe input form
            switch ($this->fields[$i]['type']) {
                case 'text':
                case 'password':
                    echo "<td><input type='" . $this->fields[$i]['type'] . "' name='" . $this->fields[$i]['name'] . "'></td>";
                    break;
                case 'radio':
                    foreach ($this->fields[$i]['options'] as $option) {
                        echo "<td><input type='radio' name='" . $this->fields[$i]['name'] . "' value='" . $option . "'>" . $option . "</td>";
                    }
                    break;
                case 'checkbox':
                    foreach ($this->fields[$i]['options'] as $option) {
                        echo "<td><input type='checkbox' name='" . $this->fields[$i]['name'] . "[]' value='" . $option . "'>" . $option . "</td>";
                    }
                    break;
                case 'select':
                    echo "<td><select name='" . $this->fields[$i]['name'] . "'>";
                    foreach ($this->fields[$i]['options'] as $option) {
                        echo "<option value='" . $option . "'>" . $option . "</option>";
                    }
                    echo "</select></td>";
                    break;
                case 'textarea':
                    echo "<td><textarea name='" . $this->fields[$i]['name'] . "' rows='4' cols='50'></textarea></td>";
                    break;
            }
            echo "</tr>";
        }

        // Tombol submit
        echo "<tr><td><input type='submit' name='submit' value='" . $this->submit . "'></td></tr>";
        echo "</table>";
        echo "</form>";
    }

    // Menambahkan field ke form
    function addField($name, $label, $type, $options = null) {
        $this->fields[$this->jumField]['name'] = $name;
        $this->fields[$this->jumField]['label'] = $label;
        $this->fields[$this->jumField]['type'] = $type;
        $this->fields[$this->jumField]['options'] = $options;
        $this->jumField++;
    }
}
?>
