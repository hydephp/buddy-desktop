<x-app-layout>
    <x-slot name="title">
        {{ config('app.name') }} Live Site
    </x-slot>
    
    <header class="px-4 py-4 mt-5 text-center">
        <h1 class="text-3xl font-bold">
            Browse your Hyde Site
        </h1>
		<p class="lead">
			Site not loading? Head on over to the main dashboard and start the server!
		</p>
    </header>
	
	<style>
		#toolbar {
			display: flex;
			align-items: center;
			list-style-type: none;
			background: #353535;
			color: white;
			padding: 4px 6px;
			margin-bottom: 0;
			border-radius: 4px 4px 0 0;
		}
		#toolbar li {
			padding-left: 0;
		}
		#toolbar li button {
			padding: 4px;
			border: none;
			background: none;
			outline: none;
		}
		#toolbar input {
			margin-left: 12px;
			margin-right: 8px;
			background-color: #292a2d;
			border: none;
			border-radius: 8px;
			width: auto;
			display: flex;
			flex: 1;
			color: white;
			padding: 1px 10px;
			font-size: 14px;
		}
		#refresh {
			transition: transform 0.2s ease-in-out;
		}
	</style>

	<div class="col-12 mx-auto p-3 mb-5">
		<section id="browser-window" class="container">
			<header>
				<menu id="toolbar" type="toolbar">
					<li>
						<button id="refresh" onclick="refresh()" style="transform: rotate(0deg)">
							<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#ffffff"><path d="M0 0h24v24H0z" fill="none"/><path d="M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z"/></svg>
						</button>
					</li>
					<li>
						<a href="http://localhost:8080/" target="browser">
							<button>
								<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#ffffff"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg>
							</button>
						</a>
					</li>
					<li style="display: flex; flex: 1;">
						<input id="uri" type="text" value="localhost:8080" readonly>
					</li>
					<li>
						<button onclick="toggleFullscreen()">
							<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#ffffff"><path d="M0 0h24v24H0z" fill="none"/><path d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z"/></svg>
							{{-- <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#ffffff"><path d="M0 0h24v24H0z" fill="none"/><path d="M5 16h3v3h2v-5H5v2zm3-8H5v2h5V5H8v3zm6 11h2v-3h3v-2h-5v5zm2-11V5h-2v5h5V8h-3z"/></svg> --}}
						</button>
					</li>
				</menu>
			</header>
			<iframe id="browser" name="browser" src="http://localhost:8080/" class="col-12" style="min-height: 75vh; background-color: #fff;"></iframe>		
		</section>
	</div>

	<script>
		let browserWindow = document.getElementById('browser-window');
		let browser = document.getElementById('browser');
		let refreshButton = document.getElementById('refresh');
		let uri = document.getElementById('uri');
		function refresh() {
			// var uri = document.getElementById('uri').value;
			browser.src = browser.src;

			// Get the rotation of the refresh button
			var rotation = refreshButton.style.transform;
			// Increment with 360 degrees
			rotation = parseInt(rotation.substring(rotation.indexOf('(') + 1, rotation.indexOf(')'))) + 360;
			// Set the rotation
			refreshButton.style.transform = 'rotate(' + rotation + 'deg)';
		}

		function toggleFullscreen() {
			if (document.fullscreenElement) {
				document.exitFullscreen();
			} else {
				browserWindow.requestFullscreen();
				browser.style.height = 'calc(100% - 80px)';
			}
		}
	</script>
</x-app-layout>