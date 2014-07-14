<html>
<body>

<form action="soruEkle.php" method="post">
	Soru Metni:<br />  		<textarea name="soru_texti" rows="13" cols="44"  > </textarea><br /><br />
	
	   				<input type="radio" name="sec" value=1 /> 
	secenek1:   				<input type="text" name="secenek1" /> <br /><br />
	
	  				<input type="radio" name="sec" value=2 /> 
	secenek2:   				<input type="text" name="secenek1"/> <br /><br />
	
	  				<input type="radio" name="sec" value=3 /> 
	secenek3:   				<input type="text" name="secenek1"/> <br /><br />
	
	  				<input type="radio" name="sec" value=4/> 
	secenek4:  				<input type="text" name="secenek1"/> <br /><br />
	
	  				<input type="radio" name="sec" value=5 /> 
	secenek5:   				<input type="text" name="secenek1"/> <br /><br />
	
	zorluk derecesi: 
					<select name="zorluk">
						<option value=1>1</option>
						<option value=2>2</option>
						<option value=3>3</option>
						<option value=4>4</option>
						<option value=4>4</option>
					</select> 
	
	sorunun kategorisi:		<select name="kategori">
						<option selected value="mat">Matematik</option>
						<option value="fen">Fen</option>
						<option value="kim">Kimya</option>
						<option value="biy">Biyoloji</option>
						<option value="tur">Türkçe</option>
					</select>   	
					<br />
		    
		    
		    
					<input type="submit" name="submit" value="Kaydet" />
</form>
</body>


</html>