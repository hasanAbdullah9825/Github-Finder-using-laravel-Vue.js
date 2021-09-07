<template>
	<div>
        <h1>Pinned Repositories</h1>
        <div class="row">
	<div class="card p-2 m-4 col-md-5 " v-for="(repository,index) in usersPinnedRepositories" :key="index">
			<div class="card-body">
				<h4><a :href="repository.link" target="_blank">{{repository.repo}}</a></h4>
                <p>{{repository.description}}</p>
			</div>
            
		</div>
        </div>
	
	</div>
</template>

<script>
	export default {
        props:['usersPinnedRepositories'],
        
    };
</script>

<style scoped>
.card{
    border:1px solid #eee;
}
</style>