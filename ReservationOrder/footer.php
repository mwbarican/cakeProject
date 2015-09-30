    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<script src="typeahead.min.js"></script>
    <script>
    $(document).ready(function(){
		$('input.typeahead').typeahead({
			name: 'typeahead',
			remote:'search.php?key=%QUERY',
			limit : 10
		});
	});
    </script>

</body>

</html>
