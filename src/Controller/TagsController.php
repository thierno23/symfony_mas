<?php

namespace App\Controller;

use App\Entity\Groupetags;
use App\Repository\TagsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
 
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TagsController extends AbstractController
{
/**
     * @Route(
     *      name ="add_groupe_tags",
     *     path="/api/admin/groupetags",
     *     methods={"POST"}
     *     
     * ),
     * 
     */
    public function addGroupTag(Request $request,SerializerInterface $serializer,
     ValidatorInterface $validator,EntityManagerInterface $manager, TagsRepository $tags)
    {
        $groupeTag = new  Groupetags();
            $data=$request->request->all();
            foreach ($data['tag'] as $OneTag){ 
                $TagObject = $tags->findBy(['libelle'=>$OneTag]);
             
                if ($TagObject) {
                    $groupeTag->addTag($TagObject[0]);
                        $groupeTag->setLibelle($data['libelle']);
                       
                    }
            }
             $manager->persist($groupeTag);
             $manager->flush();
            return new JsonResponse("Vous venez de créer un nouveau groupe de Tags", Response::HTTP_CREATED, [], true);
    }    
}


