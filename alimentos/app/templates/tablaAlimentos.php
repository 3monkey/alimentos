 <?php if (count($params['resultado'])>0): ?>
 <table>
 <thead>
	 <tr>
	 <th>alimento (por 100g)</th><th>energía (Kcal)</th><th>grasa (g)</th>
	 </tr>
 </thead>
 <tbody>
	 <?php foreach ($params['resultado'] as $alimento) : ?>
	 <tr>
	 <td><a href="index.php?ctl=ver&id=<?php echo $alimento['id'] ?>"><?php echo $alimento['nombre'] ?></a></td>
	 <td><?php echo $alimento['energia'] ?></td>
	 <td><?php echo $alimento['grasatotal'] ?></td>
	 </tr>
	 <?php endforeach; ?>
 </tbody>
 </table>
 <?php endif; ?>