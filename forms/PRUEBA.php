<head>
<script type="text/javascript">
function redondeaAlAlza(x,r) {
    xx = Math.floor(x/r)
    if (xx!=x/r) {xx++}
    return (xx*r)
}
</script>
</head>

<body>
<form>
<input type="text" name="entrada">
<input type="button" value="Redondear" onClick="alert(redondeaAlAlza(this.form.entrada.value,1000))">
</form>
</body>