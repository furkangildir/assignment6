<?php
// src/Controller/ProductController.php
namespace App\Controller;
use App\Entity\Akademisyenler;
use App\Entity\Ogrenciler;
use App\Entity\Dersler;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
class DersController extends AbstractController
{
    /**
     * @Route("/ders", name="ders")
     */
    public function index(): Response
    {
        $akademisyen = new Akademisyenler();
        $akademisyen->setAd('Muhammet');
        $akademisyen->setSoyad('Çıralı');
        $akademisyen->setUzmanlik('Semantik');

        $ogrenci = new Ogrenciler();
        $ogrenci->setAd('Cenk');
        $ogrenci->setSoyad('Akıncı');
        $ogrenci->setOgrenciNo(2104467);
        

        $ders = new Dersler();
        $ders->setDersAdi('Nesnel Tasarıma Giriş');
        $ders->setDersKodu('CENG201');
        $ders->setDersAciklamasi('Nesneye Yönelik Programlama ile Kodlama Pratikleri');


        $ders->setAkademisyenId($akademisyen);
        $ders->setOgrenciId($ogrenci);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($akademisyen);
        $entityManager->persist($ogrenci);
        $entityManager->persist($ders);
        $entityManager->flush();


        return new Response(
            'Saved new ders with id: '.$ders->getId()
            .' and new akademisyen with id: '.$akademisyen->getId()
            .' and new ogrenci with id: '.$ogrenci->getId()

        );
    }

    /**
     * @Route("/ders/{id}", name="dersShow")
     */
    public function DersShow($id): Response
    {
        $ders=$this->getDoctrine()->getRepository(Dersler::class)->find($id);

        if(!$ders){
            die("Ders bulunamadı");
        }

         $ogrenciler=$ders->getOgrenciId();
         $akademisyenler=$ders->getAkademisyenId();

        return $this->render('ders/ders.html.twig', [
            'ders'=>$ders,
            'ogrenciler'=>$ogrenciler,
             'akademisyenler'=>$akademisyenler,
        ]);
    }

     /**
     * @Route("/ogrenci/{id}", name="ogrenciShow")
     */
    public function OgrenciShow($id)
    {

        $ogrenci=$this->getDoctrine()->getRepository(Ogrenciler::class)->find($id);

        if(!$ogrenci){
            die("Öğrenci bulunamadı");
        }

        $dersler=$ogrenci->getDerslers();

        return $this->render('ogrenci/ogrenci.html.twig', [
            'ogrenci'=>$ogrenci,
            'dersler'=>$dersler,
        ]);


        
    }
    /**
     * @Route("/akademisyen/{id}", name="akademisyenShow")
     */
    public function AkademisyenShow($id)
    {

        $akademisyen=$this->getDoctrine()->getRepository(Akademisyenler::class)->find($id);

        if(!$akademisyen){
            die("Akademisyen bulunamadı");
        }

         $dersler=$akademisyen->getDerslers();

        return $this->render('akademisyen/akademisyen.html.twig', [
            'akademisyen'=>$akademisyen,
            'dersler'=>$dersler,
        ]);
    }
}

