<template>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	
		<!-- <button
			class="navbar-toggler"
			type="button"
			data-toggle="collapse"
			data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent"
			aria-expanded="false"
			aria-label="Toggle navigation"
		>
			<span class="navbar-toggler-icon"></span>
		</button> -->

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<router-link class="nav-link" to="/"
						><h4 class="font-weight-bold">Home</h4></router-link
					>
				</li>
				<li class="nav-item">
					<a class="nav-link" @click="$emit('showPinnedRepository')"
						><h4 class="font-weight-bold">Overview</h4></a
					>
				</li>
				<li class="nav-item">
					<a class="nav-link" @click="$emit('all-repository')"
						><h4 class="font-weight-bold">
							Repository ({{ userdata.public_repos }})
						</h4></a
					>
				</li>

				<li class="nav-item">
					<a class="nav-link " href="#"
						><h4 class="font-weight-bold">projects</h4></a
					>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#"
						><h4 class="font-weight-bold">Packages</h4></a
					>
				</li>
			</ul>
		</div>
	</nav>
</template>

<script>
	export default {
		props: ["userdata"]
	};
</script>

<style scoped>
	li {
		cursor: pointer;
	}
</style>