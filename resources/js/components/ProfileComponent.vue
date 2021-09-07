<template>
	<div>
		<div class="container-fluid">
			<div class="row">
				<nav-bar
					@all-repository="getAllRepository"
					:userdata="userdata"
				></nav-bar>
			</div>
			<hr />
			<div class="row">
				<div class="col-md-4 ">
					<side-bar :userdata="userdata" :userId="userdata.login"> </side-bar>
				</div>
				<div class="col-md-8">
					<all-repository
						v-if="showRepository"
						:allRepositoryData="allRepositoryData"
						:userId="userdata.login"
					>
					</all-repository>
					<pinned-repository
						v-if="showPinnedRepository"
						:usersPinnedRepositories="usersPinnedRepositories"
					></pinned-repository>

					<div class="box p-2 m-3 ">
						<h3 class="text-center">Contributions in the last year</h3>
						<img class="mt-4" :src="getImg()" alt="contribution" />
					</div>
				</div>
			</div>
		</div>
		<footer class="text-center text-white bg-light ">
 
  <!-- Copyright -->
  <div class="text-center p-3 bg-primary" >
    © 2021 Copyright:
    <a class="text-white" href="https://mdbootstrap.com/">Github Inc</a>
  </div>
  <!-- Copyright -->
</footer>
	</div>
</template>

<script>
	import SideBar from "./SideBar.vue";
	import AllRepository from "./AllRepository.vue";
	import NavBar from "./NavBar.vue";
	import PinnedRepository from "./PinnedRepository.vue";

	export default {
		components: {
			SideBar,
			AllRepository,
			NavBar,
			PinnedRepository
		},
		data() {
			return {
				userdata: [],
				allRepositoryData: [],
				usersPinnedRepositories: [],

				form: new Form({
					username: ""
				}),
				showRepository: false,
				showPinnedRepository: false
			};
		},
		methods: {
			getGitJsonData() {
				axios
					.get("/get_github_user_details/" + this.$route.params.username)
					.then(response => {
						this.userdata = response.data.userDetails;
						this.allRepositoryData = response.data.usersAllRepository;
						this.usersPinnedRepositories = response.data.usersPinRepository;
					});
			},

			getImg() {
				const url =
					"https://ghchart.rshah.org/green/" + this.$route.params.username;
				return url;
			},

			getAllRepository() {
				this.showRepository = true;
				this.showPinnedRepository = false;
			},
			getPinnedRepository() {
				this.showPinnedRepository = true;
				this.showRepository = false;
			}
		},
		mounted() {
			this.getGitJsonData();
			this.getPinnedRepository();
		}
	};
</script>

<style scoped>
	.box {
		border: 1px solid;
	}
	.box img {
		width: 100%;
	}
</style>