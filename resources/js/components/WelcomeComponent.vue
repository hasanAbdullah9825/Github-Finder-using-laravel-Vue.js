<template>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-4 ">
				<div class="row justify-content-center ">
					<h1 class="text-justify font-weight-bold m-5">GitHub Finder!</h1>
					<div class="card my-5">
						<div class="card-header bg-success">
							<h3 class="font-weight-bold text-light">
								Search gitHub profile by username!
							</h3>
						</div>
						<div class="card-body">
							<form @submit.prevent="getResult()">
								<div class="form-group">
									<label for="form.username">username</label>
									<input
										type="text"
										id="form.username"
										class="form-control"
										v-model="form.username"
										placeholder="Enter username"
										name="username"
									/>
									<!-- <div style="color:red;font-weight:bold;" v-if="form.errors.has('username')" v-html="form.errors.get('username')" /> -->
									<div
										style="color:red;font-weight:bold;"
										v-if="form.errors.has('username')"
									>
										{{ form.errors.get("username") }}
									</div>
								</div>

								<button type="submit" class="btn btn-primary my-2">
									Search
								</button>

								<button @click.prevent="reset" class="btn btn-warning">
									Reset
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8" v-if="items.length !== 0">
				<div class="row">
					<div style="width:100%;" class="card m-5" >
						<div class="card-header bg-success">
							<h3 class="text-light font-weight-bold">Here is your result!</h3>
						</div>

						<div class="card-body">
							<div class="scroll">
								<table class="table table-bordered table-striped  ">
									<thead>
										<tr>
											<th scope="col"><h4>Username</h4></th>
											<th scope="col"><h4>Photo</h4></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr v-for="item in items.items" :key="item.login">
											<td>{{ item.login }}</td>

											<td>
												<img
													:src="item.avatar_url"
													class="rounded-circle"
													width="100"
													height="100"
												/>
											</td>

											<td>
												<router-link
													class="btn btn-primary bg-dark"
													:to="`/profile/${item.login}`"
													>Details</router-link
												>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				form: new Form({
					username: ""
				}),
				items: []
			};
		},

		methods: {
			// getResult() {
			// 	console.log("getResult Method");
			// 	this.items = [];
			// 	fetch(`https://api.github.com/search/users?q=${this.form.username}`)
			// 		.then(res => {
			// 			return res.json();
			// 		})
			// 		.then(data => {
			// 			this.items = data.items;
			// 		});
			// },
			getResult() {
				this.items = [];
				this.form.get("/get_github_userlist").then(res => {
					this.items = res.data.allUserData;
					//console.log(res.data.allUserData);
				});
			},
			reset() {
				this.items = [];
				this.form.username = "";
			}
		}
	};
</script>

<style scoped>
	.scroll {
		height: 600px;
		overflow-y: scroll;
	}
</style>