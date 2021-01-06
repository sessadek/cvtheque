@extends('layouts.app')


@section('content')

<div class="container" id="app">
	<div class="row">
		<div class="col-md-12">
			<!-- <h1 class="text-center text-dark">@{{ message }}</h1> -->

			<br>

			<!-- La division  : Formation -->
		<div class="card border-primary mb-3">
					<div class="card-header">
						<div class="row">
							<div class="col-md-10">
								<h3 class="card-title text-primary">Formations</h3>
							</div>

							<div class="col-md-2 text-right">
								<button class="btn btn-info" @click="openFormations = true">Ajouter</button>


							</div>

						</div>
					</div>


					<div class="card-body">

						<!--Division de formulaire-->

						<div v-if="openFormations">

							<div class="form-group">
								<label for="diplome">Diplome</label>
								<input type="text" v-model="formation.diplome" placeholder="diplome"  class="form-control" name="diplome">

							</div>

							<div class="form-group">
								<label for="diplome">Etablissement</label>
								<input type="text" v-model="formation.etablissement" placeholder="lycée/école/université"  class="form-control" name="diplome">

							</div>

							<div class="form-group">
								<label for="diplome">Ville</label>
								<input type="text" v-model="formation.ville" placeholder="ville"  class="form-control" name="diplome">

							</div>

							<div class="form-group">
								<label for="diplome">Pays</label>
								<input type="text" v-model="formation.pays" placeholder="pays"  class="form-control" name="diplome">

							</div>

							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
								<label for="debut">Date debut</label>
								<input type="date" v-model="formation.debut" placeholder="date debut"  class="form-control" name="debut">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
								<label for="fin">Date fin</label>
								<input type="date" v-model="formation.fin" placeholder="date fin"  class="form-control" name="fin">
									</div>
								</div>

							</div>

							<button v-if="editFormations" class="btn btn-warning btn-block" @click="updateFormations">Modifier</button>	

							<button v-else class="btn btn-success btn-block"  @click="addFormations">Ajouter</button>


						</div>
						<!--Fin division de formulaire-->


						<ul class="list-group">
							<li class="list-group-item" v-for="formation in formations">

								<div class="float-lg-right">

									<button class="btn btn-warning btn-sm" @click="editFomrations(formation)">Editer</button>

									<button class="btn btn-danger btn-sm" @click="deleteFormations(formation)">Supprimer</button>

								</div>

								<h5 class="text-primary">@{{ formation.diplome }}</h5>
								<p>@{{ formation.etablissement }}</p>
								<p>@{{ formation.ville }} - @{{ formation.pays }}</p>
								<small>@{{ formation.debut }} - @{{ formation.fin }}</small>
							</li>

						</ul>
					</div>
				</div>

		<!-- Fin division : Formation-->
		<br>












			
			<!-- La division  : Experiences -->
			<div class="card border-primary mb-3">

					<div class="card-header">
						<div class="row">
							<div class="col-md-10">
								<h3 class="card-title text-primary">Experiences</h3>
							</div>

							<div class="col-md-2 text-right">
								<button class="btn btn-info" @click="openExperience = true">Ajouter</button>


							</div>

						</div>
					</div>


					<div class="card-body">

						<!--Division de formulaire-->

						<div v-if="openExperience">

							<div class="form-group">
								<label for="titre">Titre</label>
								<input type="text" v-model="experience.titre" placeholder="le titre"  class="form-control" name="titre">

							</div>

							<div class="form-group">
								<label for="body">Body</label>
								<textarea class="form-control" v-model="experience.body" placeholder="le contenu"  name="body"></textarea>
							</div>

							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
								<label for="debut">Date debut</label>
								<input type="date" v-model="experience.debut" placeholder="date debut"  class="form-control" name="debut">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
								<label for="fin">Date fin</label>
								<input type="date" v-model="experience.fin" placeholder="date fin"  class="form-control" name="fin">
									</div>
								</div>

							</div>

							<button v-if="editExperiences" class="btn btn-danger btn-block" @click="updateExperience">Modifier</button>	

							<button v-else class="btn btn-success btn-block"  @click="addExperiences">Ajouter</button>


						</div>
						<!--Fin division de formulaire-->


						<ul class="list-group">
							<li class="list-group-item" v-for="experience in experiences">
								<div class="float-lg-right">
									<button class="btn btn-warning btn-sm" @click="editExperience(experience)">Editer</button>


									<button class="btn btn-danger btn-sm" @click="deleteExperience(experience)">Supprimer</button>
								</div>
								<h5 class="text-primary">@{{ experience.titre }}</h5>
								<p>@{{ experience.body }}</p>
								<small>@{{ experience.debut }} - @{{ experience.fin }}</small>
							</li>

						</ul>
					</div>

				</div>
				<!-- Fin division : Experiences-->









				<!-- La division  : Compétences -->
			<div class="card border-primary mb-3">

					<div class="card-header">
						<div class="row">
							<div class="col-md-10">
								<h3 class="card-title text-primary">Compétences</h3>
							</div>

							<div class="col-md-2 text-right">
								<button class="btn btn-info" @click="openCompetences = true">Ajouter</button>


							</div>

						</div>
					</div>


					<div class="card-body">

						<!--Division de formulaire-->

						<div v-if="openCompetences">

							<div class="form-group">
								<label for="titre">Titre</label>
								<input type="text" v-model="competence.titre" placeholder="le titre"  class="form-control" name="titre">

							</div>

							<div class="form-group">
								<label for="commentaire">Commentaire</label>
								<textarea class="form-control" v-model="competence.commentaire" placeholder=""  name="commentaire"></textarea>
							</div>

							

							<button v-if="editCompetence" class="btn btn-danger btn-block" @click="updateCompetences">Modifier</button>	

							<button v-else class="btn btn-success btn-block"  @click="addCompetences">Ajouter</button>


						</div>
						<!--Fin division de formulaire-->


						<ul class="list-group">
							<li class="list-group-item" v-for="competence in competences">
								<div class="float-lg-right">
									<button class="btn btn-warning btn-sm" @click="editCompetences(competence)">Editer</button>


									<button class="btn btn-danger btn-sm" @click="deleteCompetences(competence)">Supprimer</button>
								</div>
								<h5 class="text-primary">@{{ competence.titre }}</h5>
								<p>@{{ competence.commentaire }}</p>
							</li>

						</ul>
					</div>

				</div>
				<!-- Fin division : Compétences-->

			<!-- La division  : Langues -->
			<div class="card border-primary mb-3">

					<div class="card-header">
						<div class="row">
							<div class="col-md-10">
								<h3 class="card-title text-primary">Langues</h3>
							</div>

							<div class="col-md-2 text-right">
								<button class="btn btn-info" @click="openLangues = true">Ajouter</button>


							</div>

						</div>
					</div>


					<div class="card-body">

						<!--Division de formulaire-->

						<div v-if="openLangues">

							<div class="form-group">
								<label for="langue">Langue</label>
								<input type="text" v-model="langue.langue"  class="form-control" name="langue">

							</div>

							<div class="form-group">
								<label for="niveau">Niveau</label>
								<input type="text" class="form-control" v-model="langue.niveau" placeholder=""  name="niveau">
							</div>

							

							<button v-if="editLangue" class="btn btn-danger btn-block" @click="updateLangues">Modifier</button>	

							<button v-else class="btn btn-success btn-block"  @click="addLangues">Ajouter</button>


						</div>
						<!--Fin division de formulaire-->


						<ul class="list-group">
							<li class="list-group-item" v-for="langue in langues">
								<div class="float-lg-right">
									<button class="btn btn-warning btn-sm" @click="editLangues(langue)">Editer</button>


									<button class="btn btn-danger btn-sm" @click="deleteLangues(langue)">Supprimer</button>
								</div>
								<h5 class="text-primary">@{{ langue.langue }} : 
									<small>@{{ langue.niveau}} </small>
								</h5>
							</li>

						</ul>
					</div>

				</div>
				<!-- Fin division : Langues-->
		</div>
	</div>
				<div class="form-group">
					<a href="{{ url('cvs')}}" class="form-control btn btn-primary">Retour à la liste des CV</a>
				</div>
</div>
@endsection




@section('javascripts')

<script src="{{ asset('js/vue.js') }}"></script>
<script src="{{ asset('js/axios.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


<script>
	
        window.Laravel = {!! json_encode([
        	'csrfToken'    => csrf_token(),
        	'idCv'         => $id,
        	'url'          => url('/')

        	]) !!};
        
    </script>
<script src="{{ asset('js/js.script.js') }}"></script>

@endsection