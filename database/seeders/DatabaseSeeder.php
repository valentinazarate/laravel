<?php

namespace Database\Seeders;

use App\Models\Marca;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ========== MARCAS ==========
        $marca1 = Marca::create([
            'nombre' => 'Sin Gluten Natura',
            'slug' => 'sin-gluten-natura',
            'descripcion' => 'Marca especializada en productos libres de gluten, elaborados con ingredientes naturales y procesos certificados.',
            'activo' => true,
        ]);

        $marca2 = Marca::create([
            'nombre' => 'Orgánicos Andes',
            'slug' => 'organicos-andes',
            'descripcion' => 'Productos orgánicos cultivados en los valles de los Andes, libres de pesticidas y fertilizantes sintéticos.',
            'activo' => true,
        ]);

        $marca3 = Marca::create([
            'nombre' => 'Almendra Viva',
            'slug' => 'almendra-viva',
            'descripcion' => 'Harinas y productos derivados de almendras y frutos secos, ideales para dietas cetogénicas y sin gluten.',
            'activo' => true,
        ]);

        // ========== CATEGORÍAS (jerarquía) ==========
        $catHarinas = Categoria::create([
            'nombre' => 'Harinas sin gluten',
            'slug' => 'harinas-sin-gluten',
            'descripcion' => 'Harinas alternativas libres de gluten para panificación y cocina.',
            'activo' => true,
        ]);

        $catPanificacion = Categoria::create([
            'nombre' => 'Panificación',
            'slug' => 'panificacion',
            'descripcion' => 'Mezclas, levaduras y semillas para panificación sin gluten.',
            'activo' => true,
        ]);

        $catHarinaArroz = Categoria::create([
            'nombre' => 'Harina de arroz',
            'slug' => 'harina-de-arroz',
            'descripcion' => 'Harina fina de arroz blanco e integral.',
            'padre_id' => $catHarinas->id,
            'activo' => true,
        ]);

        $catHarinaArvejas = Categoria::create([
            'nombre' => 'Harina de arvejas',
            'slug' => 'harina-de-arvejas',
            'descripcion' => 'Harina proteica de arvejas amarillas.',
            'padre_id' => $catHarinas->id,
            'activo' => true,
        ]);

        $catHarinaAlmendras = Categoria::create([
            'nombre' => 'Harina de almendras',
            'slug' => 'harina-de-almendras',
            'descripcion' => 'Harina de almendras peladas y molidas finamente.',
            'padre_id' => $catHarinas->id,
            'activo' => true,
        ]);

        $catMezclas = Categoria::create([
            'nombre' => 'Mezclas',
            'slug' => 'mezclas',
            'descripcion' => 'Mezclas pre-elaboradas para panificación sin gluten.',
            'padre_id' => $catPanificacion->id,
            'activo' => true,
        ]);

        $catLevaduras = Categoria::create([
            'nombre' => 'Levaduras',
            'slug' => 'levaduras',
            'descripcion' => 'Levaduras secas y frescas aptas para celíacos.',
            'padre_id' => $catPanificacion->id,
            'activo' => true,
        ]);

        $catSemillas = Categoria::create([
            'nombre' => 'Semillas',
            'slug' => 'semillas',
            'descripcion' => 'Semillas orgánicas para panificación y decoración.',
            'padre_id' => $catPanificacion->id,
            'activo' => true,
        ]);

        // ========== PRODUCTOS ==========
        Producto::create([
            'nombre' => 'Harina de Almendras Orgánica',
            'slug' => 'harina-de-almendras-organica',
            'descripcion_corta' => 'Harina fina de almendras peladas, ideal para repostería keto y sin gluten.',
            'descripcion_larga' => 'Nuestra harina de almendras es elaborada a partir de almendras orgánicas seleccionadas, peladas y molidas en frío para preservar todos sus nutrientes. Rica en proteínas, grasas saludables y vitamina E. Perfecta para preparar panes, galletas y masas cetogénicas.',
            'precio_compra' => 3200.00,
            'precio_venta' => 4800.00,
            'stock' => 50,
            'stock_minimo' => 10,
            'unidad_medida' => 'kg',
            'marca_id' => $marca3->id,
            'categoria_id' => $catHarinaAlmendras->id,
            'destacado' => true,
            'activo' => true,
            'peso_gramos' => 1000.00,
            'ingredientes' => '100% almendras orgánicas peladas.',
        ]);

        Producto::create([
            'nombre' => 'Harina de Arroz Integral',
            'slug' => 'harina-de-arroz-integral',
            'descripcion_corta' => 'Harina de arroz integral finamente molida, libre de gluten.',
            'descripcion_larga' => 'Harina obtenida de arroz integral cultivado sin pesticidas. Molida en piedra para mantener la textura ideal. Versátil para usar en panes, tortillas, galletas y como espesante en salsas.',
            'precio_compra' => 1200.00,
            'precio_venta' => 1900.00,
            'stock' => 80,
            'stock_minimo' => 15,
            'unidad_medida' => 'kg',
            'marca_id' => $marca1->id,
            'categoria_id' => $catHarinaArroz->id,
            'destacado' => false,
            'activo' => true,
            'peso_gramos' => 1000.00,
            'ingredientes' => '100% arroz integral orgánico.',
        ]);

        Producto::create([
            'nombre' => 'Harina de Arvejas Proteica',
            'slug' => 'harina-de-arvejas-proteica',
            'descripcion_corta' => 'Harina rica en proteínas vegetales, ideal para panificación alta en proteínas.',
            'descripcion_larga' => 'Elaborada a partir de arvejas amarillas orgánicas deshidratadas y molidas. Contiene 22g de proteína por cada 100g. Excelente para mezclar con otras harinas sin gluten y mejorar el perfil nutricional de tus preparaciones.',
            'precio_compra' => 1800.00,
            'precio_venta' => 2800.00,
            'stock' => 40,
            'stock_minimo' => 8,
            'unidad_medida' => 'kg',
            'marca_id' => $marca2->id,
            'categoria_id' => $catHarinaArvejas->id,
            'destacado' => true,
            'activo' => true,
            'peso_gramos' => 1000.00,
            'ingredientes' => '100% arvejas amarillas orgánicas.',
        ]);

        Producto::create([
            'nombre' => 'Mezcla Panificable sin Gluten',
            'slug' => 'mezcla-panificable-sin-gluten',
            'descripcion_corta' => 'Mezcla lista para hornear pan sin gluten con textura esponjosa.',
            'descripcion_larga' => 'Mezcla equilibrada de harinas sin gluten (arroz, almendra y tapioca) con goma xántica y sal. Solo necesitas agregar agua y levadura para obtener un pan esponjoso y delicioso. Libre de lácteos y soja.',
            'precio_compra' => 2500.00,
            'precio_venta' => 3900.00,
            'stock' => 60,
            'stock_minimo' => 12,
            'unidad_medida' => 'kg',
            'marca_id' => $marca1->id,
            'categoria_id' => $catMezclas->id,
            'destacado' => true,
            'activo' => true,
            'peso_gramos' => 1000.00,
            'ingredientes' => 'Harina de arroz integral, harina de almendras, almidón de tapioca, goma xántica, sal marina.',
        ]);

        Producto::create([
            'nombre' => 'Levadura Seca Orgánica',
            'slug' => 'levadura-seca-organica',
            'descripcion_corta' => 'Levadura seca activa orgánica, apta para celíacos.',
            'descripcion_larga' => 'Levadura Saccharomyces cerevisiae cultivada en medios orgánicos. Presentación en gránulos finos de fácil hidratación. Ideal para panes, pizzas y masas sin gluten. Certificada libre de gluten.',
            'precio_compra' => 800.00,
            'precio_venta' => 1350.00,
            'stock' => 100,
            'stock_minimo' => 20,
            'unidad_medida' => 'unidad',
            'marca_id' => $marca2->id,
            'categoria_id' => $catLevaduras->id,
            'destacado' => false,
            'activo' => true,
            'peso_gramos' => 100.00,
            'ingredientes' => 'Saccharomyces cerevisiae, maltodextrina orgánica.',
        ]);

        Producto::create([
            'nombre' => 'Semillas de Chía Orgánicas',
            'slug' => 'semillas-de-chia-organicas',
            'descripcion_corta' => 'Semillas de chía orgánicas, ricas en omega-3 y fibra.',
            'descripcion_larga' => 'Semillas de chía (Salvia hispánica) cultivadas orgánicamente en los valles andinos. Fuente natural de ácidos grasos omega-3, antioxidantes y fibra soluble. Ideal para agregar a panes, budines, smoothies y pudines.',
            'precio_compra' => 1500.00,
            'precio_venta' => 2400.00,
            'stock' => 70,
            'stock_minimo' => 15,
            'unidad_medida' => 'kg',
            'marca_id' => $marca3->id,
            'categoria_id' => $catSemillas->id,
            'destacado' => true,
            'activo' => true,
            'peso_gramos' => 500.00,
            'ingredientes' => '100% semillas de chía orgánicas.',
        ]);

        Producto::create([
            'nombre' => 'Semillas de Lino Dorado',
            'slug' => 'semillas-de-lino-dorado',
            'descripcion_corta' => 'Semillas de lino dorado orgánicas, ricas en fibra y omega-3.',
            'descripcion_larga' => 'Semillas de lino dorado (Linum usitatissimum) seleccionadas y envasadas artesanalmente. Ideales para moler y usar como reemplazo de huevo en repostería vegana, o enteras para decorar panes y galletas.',
            'precio_compra' => 1100.00,
            'precio_venta' => 1800.00,
            'stock' => 90,
            'stock_minimo' => 15,
            'unidad_medida' => 'kg',
            'marca_id' => $marca1->id,
            'categoria_id' => $catSemillas->id,
            'destacado' => false,
            'activo' => true,
            'peso_gramos' => 500.00,
            'ingredientes' => '100% semillas de lino dorado orgánicas.',
        ]);
    }
}
