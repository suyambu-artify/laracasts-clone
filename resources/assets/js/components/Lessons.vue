<template>
	<div class="test">
		<ul v-for="lesson in parseLessons">
			<li>{{lesson.title}}</li>
		</ul>
	</div>
</template>

<script>
	export default{
		props :['default_lessons'],
		data(){
			return {
				lessons : this.default_lessons
			}
		},
			computed :{
				parseLessons(){
					return JSON.parse(this.lessons)
				}
			},
		}
	
</script>