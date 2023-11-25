<style>

    
body{
  background-color: #ffffff;
}
.navbar {
    background-color: #fcc95a;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: solid 2px #dfdede;
  }
  .search {
  display: inline-block;
  position: relative;
  margin-top: 0px;
}

.search input[type="text"] {
  width: 300px;
  height: 30px;
  padding: 10px;
  border: none;
  border-radius: 20px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.search button[type="submit"] {
  background-color: #f8a232;
  height: 50px;
  border: none;
  color: #fff;
  cursor: pointer;
  padding: 10px 20px;
  border-radius: 20px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  position: absolute;
  top: 0;
  right: 0;
  transition: .9s ease;
}

.search button[type="submit"]:hover {
  transform: scale(1.1);
  color: rgb(255, 255, 255);
  background-color: blue;
}

.button-container {
  display: flex;
  background-color:transparent;
  width: 230px;
  height: 50px;
  align-items: center;
  justify-content: space-around;
  border-radius: 10px;
  margin-top: -5px;
 
}

.button {
  outline: 0 !important;
  border: 0 !important;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background-color: transparent;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #000000;
  transition: all ease-in-out 0.3s;
  cursor: pointer;
}

.button:hover {
  transform: translateY(-3px);
}

.icon {
  font-size: 10px;
}









.form {
  display: flex;
  flex-direction: column;
  gap: 10px;
  background-color: #ffffff;
  padding: 60px;
  width: 450px;
  border-radius: 20px;
  margin-top: 10px;
  
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

}



::placeholder {
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

.form button {
  align-self: flex-end;
}

@media screen and (max-width: 768px) {
.form {
        margin-left: -40px;
    }
}


.flex-row > label {
  color: #151717;
  font-weight: 600;
  }

.inputForm {
  border: 1.5px solid #cac9c9;
  border-radius: 10px;
  height: 50px;
  display: flex;
  align-items: center;
  padding-left: 10px;
  transition: 0.2s ease-in-out;
}

.input {
  margin-left: 10px;
  border-radius: 10px;
  border: none;
  width: 85%;
  height: 100%;
  background-color: transparent;
}

.input:focus {
  outline: none;
}

.inputForm:focus-within {
  border: 1.5px solid #f8a232;
}

.flex-row {
  display: flex;
  flex-direction: row;
  align-items: center;
  gap: 10px;
  justify-content: space-between;
}

.flex-row > div > label {
  font-size: 14px;
  color: black;
  font-weight: 400;
}

.span {
  font-size: 14px;
  margin-left: 5px;
  color: #2d79f3;
  font-weight: 500;
  cursor: pointer;
}

.button-submit {
  margin: 20px 0 10px 0;
  background-color: #f8a232;
  border: none;
  color: white;
  font-size: 15px;
  font-weight: 500;
  border-radius: 10px;
  height: 50px;
  width: 140%;
  cursor: pointer;
}

.button-submit:hover {
  background-color: #252727;
}

.p {
  text-align: center;
  color: black;
  font-size: 14px;
  margin: 5px 0;
  margin-left: 100px;
}

.btn {
  margin-top: 10px;
  width: 100%;
  height: 50px;
  border-radius: 10px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-weight: 500;
  gap: 10px;
  border: 1px solid #ededef;
  background-color: white;
  cursor: pointer;
  transition: 0.2s ease-in-out;
  margin-left: 100px;

}

.btn:hover {
  border: 1px solid #f8a232;
  ;
}

#tituloR{
  margin-top: -40px;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

    







.page {
    background-color: #f8f8f8;
    padding: 20px;
    text-align: center;
    font-family: Arial, sans-serif;
    color: #333;
    border-top: 1px solid #ccc;
}

.type {
    margin-top: 20px;
}

.text-center {
    text-align: center;
    margin-bottom: 10px;
}

/* Estilos para pantallas más pequeñas (menos de 768px) */
@media screen and (max-width: 768px) {
    .page {
        padding: 10px;
        margin-top: 100px;
    }
}



</style>


<footer class="page padding trim">
      <div class="type">
          <p class="text-center">© 2023 Online Commerce. Todos los derechos reservados.</p>
          <p class="text-center">Calle Principal 123, Ciudad, Estado</p>
          <p class="text-center">Teléfono: 123-456-7890</p>
          <p class="text-center">Correo electrónico: info@onlinecommerce.com</p>
      </div>
  </footer>