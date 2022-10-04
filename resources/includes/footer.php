<div class="maincontent container">


	<div class="modal fade" id="myModal" style="overflow: hidden;" role="dialog">
		<canvas id="canvas" style="position: fixed; top: 0;"></canvas>
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<p><br><strong id="queryresult"></strong></p>
					<p class="modal-body">Press 'S' on your keyboard to start a new Raffle</p>
				</div>
			</div>
		</div>
	</div>


	<div class="footer navbar-fixed-bottom" style="margin-bottom: 2em;">
		<div style="font-size: 1.5rem;">
			&copy; <?php $fromYear = 2021; $thisYear = (int)date('Y'); echo $fromYear . (($fromYear != $thisYear) ? '-' . $thisYear : '');?> 
			This system is developed & designed by: <a href="https://loisvelasco.is-a.dev/" target="_blank">Louis Velasco</a>
		</div>
	</div>
</div>
</div> <!-- /#content -->

</body>

</html>