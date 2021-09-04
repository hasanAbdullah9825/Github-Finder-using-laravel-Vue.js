<template>
	<div class="container">
		<div class="row justify-content-center my-5">
			<h1 class="justify-content-center text-success my-5  ">
				Here is all about {{ userdata.name }}'s GitHub!!
			</h1>

			<div class="col-md-9">
				<table class="table table-bordered table-striped">
					<tr>
						<th>Name</th>
						<td>{{ userdata.name }}</td>
					</tr>
					<tr>
						<th>Username</th>
						<td>{{ userdata.login }}</td>
					</tr>

					<tr>
						<th>Bio</th>
						<td>{{ userdata.bio ? userdata.bio : "Not given yet" }}</td>
					</tr>
					<tr>
						<th>Total Repository</th>
						<td>{{ userdata.public_repos }}</td>
					</tr>
					<tr>
						<th>Followers</th>
						<td>{{ userdata.followers }}</td>
					</tr>
					<tr>
						<th>Company</th>
						<td>{{ userdata.company ? userdata.company : "Not given yet" }}</td>
					</tr>
					<tr>
						<th>Go To Profile</th>
						<td>
							<a
								:href="userdata.html_url"
								target="_blank"
								class="btn btn-success"
								>Go</a
							>
						</td>
					</tr>
				</table>
<br>
				<div>
					<h4>This year's Contribution</h4>
					<img :src="getImg()" alt="contribution" /></div>
				<div class="m-2"><router-link to="/" class="btn btn-danger">Back</router-link></div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				userdata: []
			};
		},
		methods: {
			getResult() {
				fetch(`https://api.github.com/users/${this.$route.params.username}`)
					.then(res => {
						return res.json();
					})
					.then(data => {
						this.userdata = data;
					});
			},

			getImg() {
				const url =
					"https://ghchart.rshah.org/green/" + this.$route.params.username;
				return url;
			}
		},
		mounted() {
			this.getResult();
		}
	};
</script>