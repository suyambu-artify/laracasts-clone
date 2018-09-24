<template>
	<div>
		<div :data-vimeo-id="lesson.video_id" data-vimeo-width="800" id="handstick"></div>
	</div>
</template>
<script>

	import axios from 'axios'
	import Swal from 'sweetalert';
	import Player from '@vimeo/player';

	export default{
		props :['default_lesson','next_lesson'],
		data(){
			return {
				lesson : JSON.parse(this.default_lesson)
			}
		},
		methods :{

			notilessoncompleted(){
				if (this.next_lesson) {
					Swal({
						title:'awsome you just completed this lesson',
						text:"you will redirected automaticly to next lesson",
						icon:"success",
						button: {text: "continue"},					
					}).then(()=>{
						window.location = this.next_lesson
					});
				}else{
					Swal({
						title:'congratulation',
						text:"you had completed this serie",
						icon:"success",
						button: {text: "close"},					
					}).then(()=>{window.location=''})
				}

			},

			lessonCompleted(){
				axios.post(`/frontend/complete/lesson/${this.lesson.id}`,{})
				.then(response =>{
					this.notilessoncompleted()
				}).catch(error => {
					console.log(error)
				})
			}

		},
		mounted(){
			
			const player = new Player('handstick');

			player.on('ended',()=>{
				this.lessonCompleted()
			});

		},

		
	}	

</script>