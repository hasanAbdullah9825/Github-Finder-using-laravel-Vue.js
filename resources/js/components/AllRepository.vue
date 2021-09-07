<template>
	<div>
		<div v-for="(repository, index) in allRepositoryData" :key="index">
			<h2 class="font-weight-bold text-primary">
				<a
					:href="`https://github.com/${userId}/${repository.name}`"
					target="_blank"
					>{{ repository.name }}</a
				>
			</h2>

			<h4 class="font-weight-bold text-secondary">
				{{ repository.description }}
			</h4>
			<i class="bi bi-circle-fill">{{ repository.language }}&nbsp</i>
			<span>Updated on {{ repository.updated_at.split("T")[0] }}&nbsp</span>
			<span>
				<i class="bi bi-star-fill">{{ repository.stargazers_count }} </i></span
			>
			<hr />
		</div>
	</div>
</template>
<script>
	export default {
		props: ["allRepositoryData", "userId"]
	};
</script>

<style scoped>
	@import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css");
	.dot {
		height: 25px;
		width: 25px;
		background-color: #bbb;
		border-radius: 50%;
		display: inline;
	}
</style>