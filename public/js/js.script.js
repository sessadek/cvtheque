	
var app = new Vue({
		el: '#app',
		
		data:{
			message: 'H.Hamza - Laravel Project',
			experiences : [],
			formations :  [],
			competences : [],
			langues :     [],

			openExperience :  false,
			openFormations :  false,
			openCompetences : false,
			openLangues :     false,

			//Data Binding les éléments de code HTML seront liés à aucontrôleur JavaScript
			experience : { 
							id : 0,
							cv_id : window.Laravel.idCv,
							titre : '',
							body : '',
							debut : '',
							fin : ''
						},

			formation : { 
							id : 0,
							cv_id : window.Laravel.idCv,
							diplome : '',
							etablissement : '',
							ville : '',
							pays : '',
							debut : '',
							fin : ''
						},
			competence : {
							id : 0,
							cv_id : window.Laravel.idCv,
							titre : '',
							commentaire : ''
						},
			langue : {
							id : 0,
							cv_id : window.Laravel.idCv,
							langue : '',
							niveau : ''
						},
						
			editExperiences:   false,
			editFormations :   false,
			editCompetence :  false,	
			editLangue :      false		
			},

			methods:{
				getExperiences:function(){
					axios.get(window.Laravel.url+'/getExperiences/'+window.Laravel.idCv)
					.then(response => {
						console.log(response)
						this.experiences = response.data
					})
					.catch(error => {
						console.log('errors:' ,error)
					})
				},
				addExperiences:function(){
					axios.post(window.Laravel.url+'/addExperiences',this.experience)
					.then(response => {

							this.openExperience = false;
							this.experience.id = response.data.id;
							this.experiences.unshift(this.experience);

							this.experience = { 
							id : 0,
							cv_id : window.Laravel.idCv,
							titre : '',
							body : '',
							debut : '',
							fin : ''
						}
						
						//console.log(response)
					})
					.catch(error => {
						console.log('errors:' ,error)
					})
				},

				editExperience:function(experience){
					this.openExperience = true
					this.editExperiences = true //distinguer entre l'action d'edition et l'ajout
					this.experience = experience
					


				},

				updateExperience:function(){
					axios.put(window.Laravel.url+'/updateExperience',this.experience)
					.then(response => {
						if(Response.data.etat){
							this.openExperience = false;
							

							this.experience = { 
							id : 0,
							cv_id : window.Laravel.idCv,
							titre : '',
							body : '',
							debut : '',
							fin : ''
						};
						}
						this.editExperiences = false
					})
					.catch(error => {
						console.log('errors:' ,error)
					})

				},

				deleteExperience:function(experience){
					Swal.fire({
 						 title: 'Are you sure?',
 						 text: "You won't be able to revert this!",
 						 icon: 'warning',
 						 showCancelButton: true,
 						 confirmButtonColor: '#3085d6',
 						 cancelButtonColor: '#d33',
 						 confirmButtonText: 'Yes, delete it!'
						}).then((result) => {



						axios.delete(window.Laravel.url+'/deleteExperience/'+experience.id)
						.then(response => {

							if(response.data.etat)
							{
							var position = this.experiences.indexOf(experience);
							this.experiences.splice(position,1);
							}

						})


						.catch(error =>{
							console.log(error)
						})






 						 if (result.value) {
  						  Swal.fire(
   						   'Deleted!',
    						  'Your file has been deleted.',
    						  'success'
   						 )
  						}
						})



















				},



				//Formation functions

				getFormations:function(){
					axios.get(window.Laravel.url+'/getFormations/'+window.Laravel.idCv)
					.then(response => {
						//console.log(response)
						this.formations = response.data
					})
					.catch(error => {
						console.log('errors:' ,error)
					})
				},
				addFormations:function(){
					axios.post(window.Laravel.url+'/addFormations',this.formation)
					.then(response => {
						if(response.data.etat){
							this.openFormations = false;
							this.formation.id = response.data.id;
							this.formations.unshift(this.formation);

							this.formation = { 
							id : 0,
							cv_id : window.Laravel.idCv,
							titre : '',
							body : '',
							debut : '',
							fin : ''
						}
					}
						
						//console.log(response)
					})
					.catch(error => {
						console.log('errors:' ,error)
					})
				},

				editFomrations:function(formation){
					this.openFormations = true
					this.editFormations = true    //distinguer entre l'action d'edition et l'ajout
					this.formation = formation
				},

				updateFormations:function(){
					axios.put(window.Laravel.url+'/updateFormations',this.formation)
					.then(response => {
						if(Response.data.etat){
							this.openFormatioins = false;
							

							this.experience = { 
							id : 0,
							cv_id : window.Laravel.idCv,
							titre : '',
							body : '',
							debut : '',
							fin : ''
						};
						}
						this.editFormations = false
					})
					.catch(error => {
						console.log('errors:' ,error)
					})


				},

				deleteFormations:function(formation){

					Swal.fire({
						  title: 'Are you sure?',
						  text: "You won't be able to revert this!",
						  type: 'warning',
						  showCancelButton: true,
						  confirmButtonColor: '#3085d6',
						  cancelButtonColor: '#d33',
						  confirmButtonText: 'Yes, delete it!'
						})
					.then((result) => {
							axios.delete(window.Laravel.url+'/deleteFormations/'+formation.id)
					.then(response => {
					if(response.data.etat){
					var position = this.formations.indexOf(formation);
					this.formations.splice(position,1);
						
						}
						
					})
					.catch(error => {
						console.log('errors:' ,error)
					})





						  if (result.value) {
						    Swal.fire(
						      'Deleted!',
						      'Your file has been deleted.',
						      'success'
						    )
						  }
						})







						
				},

				//end of Formation functions ^_^




				//Competence methods
				getCompetences:function(){
					axios.get(window.Laravel.url+'/getCompetences/'+window.Laravel.idCv)
					.then(response => {
						//console.log(response)
						this.competences = response.data
					})
					.catch(error => {
						console.log('errors:' ,error)
					})
				},
				addCompetences:function(){
					axios.post(window.Laravel.url+'/addCompetences',this.competence)
					.then(response => {

							this.openCompetences = false;
							this.competence.id = response.data.id;
							this.competences.unshift(this.competence);

							this.competence = { 
							id : 0,
							cv_id : window.Laravel.idCv,
							titre : '',
							commentaire : ''
						}
						
						//console.log(response)
					})
					.catch(error => {
						console.log('errors:' ,error)
					})
				},

				editCompetences:function(competence){
					this.openCompetences = true
					this.editCompetence = true //distinguer entre l'action d'edition et l'ajout
					this.competence = competence
					


				},

				updateCompetences:function(){
					axios.put(window.Laravel.url+'/updateCompetences',this.competence)
					.then(response => {
						if(Response.data.etat){
							this.openCompetences = false;
							

							this.competence = { 
							id : 0,
							cv_id : window.Laravel.idCv,
							titre : '',
							commentaire : ''
						};
						}
						this.editCompetence = false
					})
					.catch(error => {
						console.log('errors:' ,error)
					})

				},

				deleteCompetences:function(competence){
						Swal.fire({
						  title: 'Are you sure?',
						  text: "You won't be able to revert this!",
						  type: 'warning',
						  showCancelButton: true,
						  confirmButtonColor: '#3085d6',
						  cancelButtonColor: '#d33',
						  confirmButtonText: 'Yes, delete it!'
						}).then((result) => {


							axios.delete(window.Laravel.url+'/deleteCompetences/'+competence.id)
					.then(response => {
					if(response.data.etat){
					var position = this.competences.indexOf(competence);
					this.competences.splice(position,1);
						
						}
						
					})
					.catch(error => {
						console.log('errors:' ,error)
					})





						  if (result.value) {
						    Swal.fire(
						      'Deleted!',
						      'Your file has been deleted.',
						      'success'
						    )
						  }
						})
				},


























				//Langue methods
				getLangues:function(){
					axios.get(window.Laravel.url+'/getLangues/'+window.Laravel.idCv)
					.then(response => {
						//console.log(response)
						this.langues = response.data
					})
					.catch(error => {
						console.log('errors:' ,error)
					})
				},
				addLangues:function(){
					axios.post(window.Laravel.url+'/addLangues',this.langue)
					.then(response => {

							this.openCompetences = false;
							this.langue.id = response.data.id;
							this.langues.unshift(this.langue);

							this.langue = { 
							id : 0,
							cv_id : window.Laravel.idCv,
							langue : '',
							niveau : ''
						}
						
						//console.log(response)
					})
					.catch(error => {
						console.log('errors:' ,error)
					})
				},

				editLangues:function(langue){
					this.openLangues = true
					this.editLangue = true //distinguer entre l'action d'edition et l'ajout
					this.langue = langue
					


				},

				updateLangues:function(){
					axios.put(window.Laravel.url+'/updateLangues',this.langue)
					.then(response => {
						if(Response.data.etat){
							this.openLangues = false;
							

							this.langue = { 
							id : 0,
							cv_id : window.Laravel.idCv,
							langue : '',
							niveau : ''
						};
						}
						this.editLangue = false
					})
					.catch(error => {
						console.log('errors:' ,error)
					})

				},

				deleteLangues:function(langue){
						Swal.fire({
						  title: 'Are you sure?',
						  text: "You won't be able to revert this!",
						  type: 'warning',
						  showCancelButton: true,
						  confirmButtonColor: '#3085d6',
						  cancelButtonColor: '#d33',
						  confirmButtonText: 'Yes, delete it!'
						}).then((result) => {


							axios.delete(window.Laravel.url+'/deleteLangues/'+langue.id)
					.then(response => {
					if(response.data.etat){
					var position = this.langues.indexOf(langue);
					this.langues.splice(position,1);
						
						}
						
					})
					.catch(error => {
						console.log('errors:' ,error)
					})





						  if (result.value) {
						    Swal.fire(
						      'Deleted!',
						      'Your file has been deleted.',
						      'success'
						    )
						  }
						})
				}






			



































			//created functions
			},
			created:function(){
				this.getExperiences();
				this.getFormations();
				this.getCompetences();
				this.getLangues();
				
			}
			
		});