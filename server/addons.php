<?php
function get_message(string $message, string $header)
{
?>
    <script>
        alert("<?= $message ?>")
        window.location = "<?= $header ?>"
    </script>
<?php
}
