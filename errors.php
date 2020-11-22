<?php
if (isset($_SESSION['errors'])) {
    ?>
    <small class="error">
    <?php
     echo $_SESSION['errors'];
     ?>
    </small>
    <?php
    unset($_SESSION['errors']);
}
