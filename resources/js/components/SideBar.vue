<template>
	<div class="justify-content-center">
		<img
			:src="userdata.avatar_url"
			class="rounded-circle"
			width="200"
			height="200"
		/>
		<h1>{{ userdata.login }}</h1>
		<h6>{{ userdata.bio }}</h6>

		<div class="justify-content-center">
			<button type="button" class="btn btn-primary btn-sm ">Follow</button>
		</div>

		<div>
			<h3>
				<span
					>{{ userdata.followers }} Followers {{ userdata.following }} Following
				</span>
			</h3>
			<h4>{{ userdata.company }}</h4>
			<h4>
				<i class="bi bi-geo-alt-fill">{{ userdata.location }}</i>
			</h4>
		</div>
	</div>
</template>

<script>
	export default {
		props: ["userdata"]
	};
</script>
<style scoped>
</style>