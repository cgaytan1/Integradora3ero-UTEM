<script>
    $(document).ready(function(){
    $('select').formSelect();
    });
 </script>
<div class="section">
				<form action="categorias.php" method="POST">
		    	<h5 style="text-align: center;">CATEGORIAS</h5>
		    	<div class="input-field col s12">
			    <select onchange="this.form.submit()" id="categ" name="categ">
			      <option value="" disabled selected>Escritura</option>
			      <option value="Boligrafos">Bolígrafos</option>
			      <option value="Crayones">Plumones</option>
			      <option value="Lapices">Lapices</option>
			      <option value="Crayones">Crayones</option>
			      <option value="Colores">Colores</option>
			    </select>
			    <select onchange="this.form.submit()" id="categ" name="categ">
			      <option value="" disabled selected>Oficina</option>
			      <option value="Broches">Broches</option>
			      <option value="Clips">Clips</option>
			      <option value="Chinches">Chinches</option>
			      <option value="Engrapadoras">Engrapadoras</option>
			      <option value="Sujeta">Sujeta papeles</option>
			      <option value="Puntillas">Puntillas</option>
			      <option value="Sellos">Sellos</option>
			      <option value="Tintas">Tintas</option>
			    </select>
			    <select onchange="this.form.submit()" id="categ" name="categ">
			      <option value="" disabled selected>Escolar</option>
			      <option value="Borradores">Borradores</option>
			      <option value="Sacapuntas">Sacapuntas</option>
			      <option value="Medicion">Medición</option>
			      <option value="Libretas">Libretas</option>
			      <option value="Correctores">Correctores</option>
			      <option value="Resistol">Resistol</option>
			      <option value="Sacapuntas">Sacapuntas</option>
			      <option value="Tijeras">Tijeras</option>
			    </select>
			    <select onchange="this.form.submit()" id="categ" name="categ">
			      <option value="" disabled selected>Arte y diseño</option>
			      <option value="Pistolas">Pistolas de sílicon</option>
			      <option value="Silicon">Sílicon</option>
			      <option value="Pinturas">Pinturas</option>
			      <option value="Plastilinas">Plastilinas</option>
			    </select>
			  	</div>
			  </form>
		  	</div>
