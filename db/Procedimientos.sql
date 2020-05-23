CREATE PROCEDURE SaveorUpdateProduct(
    IN @Id INT(255),
    IN @descripcion VARCHAR(255),
    IN @Id_cat INT(255),
    IN @precio DECIMAL(50),
    IN @cantidad INT(255),
    IN @imagen VARCHAR(255),
    IN @estado BOOLEAN
AS
begin
	if EXISTS (select * from productos Where Id = @Id) 
	begin
		update productos
		Set descripcion = @descripcion,
        	Id_cat = @Id_cat,
			    precio = @precio,
          cantidad = @cantidad,
			    imagen = @imagen,
			    estado = @estado,
		Where Id = @Id

		Select * from productos Where Id=@Id /*Para no mostrar las filas afectadas sino que muestre luego
		el campo afectado*/
	end
	else 
	begin
		insert into Productos Values(@descripcion,@Id_cat,@precio,@cantidad,@imagen,@estado)
		select * from productos where Id=@@IDENTITY
	end
end