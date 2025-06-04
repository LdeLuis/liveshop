<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuracion;
use App\Seccion;
use App\Faq;
use App\Politica;
use App\SliderPrincipal;
use App\Categoria;
use App\Catalogo;
use App\CatalogoCaracteristicas;
use App\CatalogoGaleria;
use App\Talla;
use App\Tematica;
use App\Blog;
use App\Elemento;
use App\Imagen;
use App\Marca;
use App\Ticket;
use App\Ubicacion;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;



class FrontController extends Controller
{
    public function index(Request $request) {
        $config = Configuracion::first();
        $elements = Elemento::where('seccion', 4)->get();
        $slider_principal = SliderPrincipal::all();
        $marca = Marca::all();
        $categoria = Categoria::all();

        $perPage = $request->header('X-Per-Page') 
            ?? $request->input('per_page', 8);

        $catalogos = Catalogo::where('activo', 1)
            ->where('visible', 1)
            ->paginate($perPage);

        $imagenesPorSeccion = Imagen::all()->groupBy('seccion')->map->first();

        return view('front.index', compact(
            'config', 'elements', 'slider_principal', 'catalogos', 
            'marca', 'categoria', 'imagenesPorSeccion'
        ));
    }

    
    

    public function admin() {
        return view('front.admin');
    }

    public function nosotros(Request $request) {
        $config = Configuracion::first();
        $elements = Elemento::all();

        $tipo = $request->query('tipo');

        $perPage = $request->header('X-Per-Page') 
            ?? $request->input('per_page', 8);

        $catalogosQuery = Catalogo::query();

        if ($tipo) {
            $catalogosQuery->where('tipo', $tipo);
        }

        $catalogos = $catalogosQuery->paginate($perPage);

        // Agrupamos imágenes por sección (catálogo ID)
        $imagenesPorSeccion = Imagen::all()->groupBy('seccion')->map->first();

        return view('front.nosotros', compact('config', 'elements', 'catalogos', 'tipo', 'imagenesPorSeccion'));
    }

    public function contacto() {
        $config = Configuracion::first();
        $elements = Elemento::all();

        return view('front.contacto', compact('config', 'elements'));
    }

    public function login() {
        $config = Configuracion::first();
        $elements = Elemento::all();

        return view('front.login', compact('config', 'elements'));
    }


    public function perfil() {
        $config = Configuracion::first();
        $elements = Elemento::all();

        return view('front.perfil', compact('config', 'elements'));
    }

    public function registro() {
        $config = Configuracion::first();
        $elements = Elemento::all();

        return view('front.registro', compact('config', 'elements'));
    }

    public function catalogo_productos($id)
    {
        $categorias = Categoria::where('activo', 1)->get()->toBase();
        $productos = Catalogo::where('activo', 1)->where('visible', 1)->get()->toBase();
        $articulo = Catalogo::find($id);
        $imagen = Imagen::all()->where('seccion', $id);
        $tallas = Talla::all()->where('seccion', $id);
        // dd($imagen);

        return view('front.catalogo_productos', compact('productos', 'categorias', 'articulo', 'imagen', 'tallas'));
    }

    public function agregarAlCarrito(Request $request)
    {
        $id = $request->input('id');
        $talla = $request->input('talla');
        $cantidad = $request->input('cantidad');
        $clave = $id . '-' . $talla; // Usamos una clave compuesta para distinguir tallas

        $carrito = session()->get('carrito', []);

        if (isset($carrito[$clave])) {
            // Si el producto con esa talla ya existe, solo sumamos la cantidad
            $carrito[$clave]['cantidad'] += $cantidad;
        } else {
            // Si no existe, lo agregamos al carrito
            $carrito[$clave] = [
                'id' => $id,
                'nombre' => $request->input('nombre'),
                'precio' => $request->input('precio'),
                'cantidad' => $cantidad,
                'talla' => $talla,
            ];
        }

        session(['carrito' => $carrito]);

        \Toastr::success('Añadido al carrito');

        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }


    public function actualizar(Request $request)
    {
        $carrito = session('carrito', []);

        if (isset($carrito[$request->clave])) {
            $stockMaximo = $carrito[$request->clave]['max'] ?? 10;
            $nuevaCantidad = min((int)$request->cantidad, $stockMaximo);

            $carrito[$request->clave]['cantidad'] = $nuevaCantidad;
            session(['carrito' => $carrito]);

            return response()->json([
                'success' => true,
                'mensaje' => 'Producto actualizado en carrito'
            ]);
        }

        return response()->json([
            'error' => true,
            'mensaje' => 'No se pudo actualizar el producto'
        ]);
    }

    public function eliminar(Request $request)
    {
        $carrito = session('carrito', []);

        if (isset($carrito[$request->clave])) {
            unset($carrito[$request->clave]);
            session(['carrito' => $carrito]);

            return response()->json([
                'success' => true,
                'mensaje' => 'Producto eliminado del carrito'
            ]);
        }

        return response()->json([
            'error' => true,
            'mensaje' => 'No se pudo eliminar el producto'
        ]);
    }

    public function ticket(Request $request)
    {
        $carrito = Session::get('carrito');
        $total = 0;

        foreach ($carrito as $item) {
            $subtotal = $item['precio'] * $item['cantidad'];
            $total += $subtotal;

            $detalle[] = [
                'id' => $item['id'],
                'name' => $item['nombre'],
                'talla' => $item['talla'],
                'precio' => $item['precio'],
                'cantidad' => $item['cantidad'],
                'subtotal' => $subtotal
            ];
        }

        $ticketId = 'TKT-' . date('Ymd-His') . '-' . rand(100, 999);

        $ticket = new Ticket;

        $ticket->ticket = $ticketId;
        $ticket->usuario = '0';
        $ticket->productos = json_encode($detalle);
        $ticket->total = $total;
        $ticket->lugar = $request->radiolugar;


        if ($ticket->save()) {
            Session::forget('carrito');
            \Toastr::success('Compra realizada Exitosamente!');
        
            foreach ($detalle as $item) {
                $articulo = Talla::where('seccion', $item['id'])
                                 ->where('talla', $item['talla'])
                                 ->first();
        
                if ($articulo) {
                    $articulo->cantidad -= $item['cantidad']; // descuenta según la cantidad comprada
                    $articulo->save();
                }
            }
        } else {
            \Toastr::error('Error al hacer la compra');
        }
        

        return redirect()->route('front.home');
    }

    public function catalogo_detalle(Catalogo $producto) {
        return view('front.catalogo_detalle', compact('producto'));
    }

    public function detalleCarrito()
    {
        $direcciones = Ubicacion::all();

        return view('front.detalleCarrito', compact('direcciones'));
    }

    public function blog() {
        $tematicas = Tematica::where('activo', 1)->where('oculto', 0)->get()->toBase();
        $blogs = Blog::where('activo', 1)->where('oculto', 0)->get()->toBase();

        return view('front.blog', compact('blogs', 'tematicas'));
    }

    public function blog_detalle(Blog $blog) {
        return view('front.blog_detalle', compact('blog'));
    }

    public function aviso_privacidad() {
        $aviso_privacidad = Politica::find(1);
        return view('front.aviso_privacidad', compact('aviso_privacidad'));
    }

    public function metodos_pago() {
        $metodos_pago = Politica::find(2);
        return view('front.metodos_pago', compact('metodos_pago'));
    }

    public function devoluciones() {
        $devoluciones = Politica::find(3);
        return view('front.devoluciones', compact('devoluciones'));
    }

    public function terminos_condiciones() {
        $terminos_condiciones = Politica::find(4);
        return view('front.terminos_condiciones', compact('terminos_condiciones'));
    }

    public function garantias() {
        $garantias = Politica::find(7);
        return view('front.garantias', compact('garantias'));
    }

    public function politicas_envio() {
        $politicas_envio = Politica::find(6);
        $terminos_condiciones = Politica::find(4);
        return view('front.politicas_envio', compact('politicas_envio','terminos_condiciones'));
    }

    public function faqs() {
        $preguntas = Faq::all();
        return view('front.faqs', compact('preguntas'));
    }

    public function formularioContact(Request $request) {
        $mail = new PHPMailer;
		$validate = Validator::make($request->all(),[
			'nombre' => 'required',
			"empresa" => "required",
			'email' => 'required',
            'whatsapp' => 'required',
			"mensaje" => "required",
		],[],[]);

		if ($validate->fails()) {
			\Toastr::error('Error, se requieren todos los datos');
			return redirect()->back();
		}

		$data = array(
			'tipoForm' => $request->tipoForm,
			'nombre' => $request->nombre,
			'empresa' => $request->empresa,
			'email' => $request->email,
            'whatsapp' => $request->whatsapp,
			'mensaje' => $request->mensaje,
			'hoy' => Carbon::now()->format('d-m-Y')
		);

		$html = view('front.mailcontact', compact('data'));

		$config = Configuracion::first();

		try {
			$mail->isSMTP();
			// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
			// $mail->SMTPDebug = 2;
			$mail->Host = $config->remitentehost;
			$mail->SMTPAuth = true;
			$mail->Username = $config->remitente;
			$mail->Password = $config->remitentepass;
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
			$mail->Port = $config->remitenteport;

			$mail->SetFrom($config->remitente, 'Ragnar - Contacto');
			$mail->isHTML(true);

			$mail->addAddress($config->destinatario,'Ragnar - Contacto');
			if (!empty($config->destinatario2)) {
				$mail->AddBCC($config->destinatario2,'Ragnar - Contacto');
			}

			$mail->Subject = 'Mensaje';

			$mail->msgHTML($html);
			// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if($mail->send()){
                \Toastr::success('Correo enviado Exitosamente!');
				return redirect()->back();
			}else{
				\Toastr::error('Error al enviar el correo');
				return redirect()->back();
			}
		} catch (phpmailerException $e) {
			\Toastr::error($e->errorMessage());//Pretty error messages from PHPMailer
			return redirect()->back();
		} catch (Exception $e) {
			\Toastr::error($e->getMessage());//Boring error messages from anything else!
			return redirect()->back();
		}
    }

    public function mailtest() {

        // $tipo_form = "home";
        $tipo_form = "contacto";

        if($tipo_form == "home") {
            $data = array(
                'tipoForm' => $tipo_form,
                'nombre' => 'Michael Eduardo Sandoval Pérez',
                'email' => 'mikeed1998@gmail.com',
                'mensaje' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                'hoy' => Carbon::now()->format('d-m-Y')
            );
        } else if($tipo_form == "contacto") {
            $data = array(
                'tipoForm' => $tipo_form,
                'nombre' => 'Michael Eduardo Sandoval Pérez',
                'telefono' => '3322932239',
                'email' => 'mikeed1998@gmail.com',
                'mensaje' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                'hoy' => Carbon::now()->format('d-m-Y')
            );
        } else {

        }

        return view('front.mailtest', compact('data'));
    }
}



