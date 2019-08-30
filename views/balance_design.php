

<div class="pt-2">
	<div class="row mb-0 pb-0">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="container bg-light border rounded shadow">
				<h2 class="text-center py-2">Balance</h2>
				<div class="row p-1 pb-3 text-left">
					<div class="col-md-6"><h5 class="">Currently you have:</h5></div>
					<div class="col-md-6">
						<h5 class="text-primary"><b>
							<?php 
								foreach ($balance as $bal) {
									echo '$'.$bal['total'];
								}
							?>
						</b></h5>
					</div>
				</div>
				<div class="row p-1 pb-4 text-left">
					<div class="col-md-6"><h6 class="">Want to see you statement?</h6></div>
					<div class="col-md-6"><a class="text-primary" href="statement">View Statement</a></div>
				</div>
			</div>
		</div>
	</div>
</div>