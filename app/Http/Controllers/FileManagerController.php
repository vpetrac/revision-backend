<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Illuminate\Support\Facades\Storage;

/**
 * Class FileManagerController
 * @package App\Http\Controllers
 */
class FileManagerController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function actions(Request $request)
    {
        $action = $request->input('action');
        $responseData = null;
        switch ($action) {
            case 'read':
                $path = $request->input('path');
                $extensionsAllow = $request->input('extensionsAllow');
                $selectedItems = $request->input('selectedItems');
                $responseData = [
                    'files' => $this->read($path, $extensionsAllow, $selectedItems),
                    'cwd' => [
                        'dateModified' => date('Y/m/d h:i:s', FacadesStorage::lastModified($path)),
                        'isFile' => false,
                        'name' => basename($path),
                        'hasChild' => false,
                        'fileType' => 'test'
                    ],
                ];
                break;
            case 'create':
                $path = $request->input('path');
                $name = $request->input('name');
                $selectedItems = $request->input('selectedItems');
                $responseData = [
                    'files' => $this->createFolder($path, $name, $selectedItems),
                    'details' => null,
                    'error' => null
                ];
                break;
            case 'delete':
                $path = $request->input('path');
                $names = $request->input('names');
                $extensionsAllow = $request->input('extensionsAllow');
                $selectedItems = $request->input('data');
                $this->delete($path, $names, $selectedItems);
                $responseData = [
                    'files' => $this->read($path, $extensionsAllow, $selectedItems),
                    'cwd' => [
                        'dateModified' => date('Y/m/d h:i:s', FacadesStorage::lastModified($path)),
                        'isFile' => false,
                        'name' => basename($path),
                        'hasChild' => false,
                        'fileType' => 'test'
                    ],
                ];
                break;
            case 'save':
                $path = $request->input('path');
                $fileUpload = $request->file('uploadFiles');
                $selectedItems = $request->input('selectedItems');
                $this->upload($path, $fileUpload, $selectedItems);
                $responseData = [
                    'error' => null
                ];
                break;
            case 'rename':
                $path = $request->input('path');
                $name = $request->input('name');
                $extensionsAllow = $request->input('extensionsAllow');
                $newName = $request->input('newName');
                $commonFiles = $request->input('commonFiles');
                $selectedItems = $request->input('selectedItems');
                $this->rename($path, $name, $newName, $commonFiles, $selectedItems);
                $responseData = [
                    'files' => $this->read($path, $extensionsAllow, $selectedItems),
                    'cwd' => [
                        'dateModified' => date('Y/m/d h:i:s', FacadesStorage::lastModified($path)),
                        'isFile' => false,
                        'name' => basename($path),
                        'hasChild' => false,
                        'fileType' => 'test'
                    ],
                ];
                break;
            case 'GetDetails':
                $path = $request->input('Path');
                $names = $request->input('Names');
                $selectedItems = $request->input('SelectedItems');
                $responseData = [
                    'details' => $this->getDetails($path, $names, $selectedItems)
                ];
                break;
            case 'download':
                $path = $request->input('path');
                $names = $request->input('names');
                $selectedItems = $request->input('data');
                return response()->download($this->download($path, $names, $selectedItems));
                break;
            case 'GetImage':
                $path = $request->input('Path');
                $selectedItems = $request->input('SelectedItems');
                return response()->download($this->download($path, null, $selectedItems, true));
                break;
            default:
                break;
        }

        return response()->json($responseData);
    }

    /**
     * @param $path
     * @param null $extensionsAllow
     * @param array $selectedItems
     * @return array
     */
    private function read($path, $extensionsAllow = null, $selectedItems = [])
    {
        $files = FacadesStorage::files($path);
        $directories = FacadesStorage::directories($path);
        $items = array_merge($files, $directories);

        $allFiles = [];

        foreach ($items as $item) {
            if (basename($item) === '.gitignore') {
                continue;
            }

            $fullPath = $path . '/' . $item; // Construct the full path to the item

            $isFile = !FacadesStorage::exists($fullPath) || !FacadesStorage::directories($fullPath); // Check if the item is not a directory

            $mimeType = FacadesStorage::mimeType($item);
            array_push($allFiles, [
                'name' => basename($item),
                'hasChild' => $mimeType == 'directory',
                'isFile' => $mimeType ? true : false,
                'type' => $mimeType,
                'dateModified' => date('Y/m/d h:i:s', FacadesStorage::lastModified($item)),
            ]);
        }

        return $allFiles;
    }

    /**
     * @param $path
     * @param string $name
     * @param array $selectedItems
     * @return array
     */
    private function createFolder($path, $name = 'New Folder', $selectedItems = [])
    {
        $file = "$path/$name";
        FacadesStorage::makeDirectory($file);

        $allFiles = [];

        $mimeType = FacadesStorage::mimeType($file);
        $fileObject = [
            'name' => basename($file),
            'hasChild' => $mimeType == 'directory',
            'isFile' => $mimeType ? true : false,
            'type' => $mimeType,
            'dateModified' => date('Y/m/d h:i:s', FacadesStorage::lastModified($file)),
        ];
        array_push($allFiles, $fileObject);

        return $allFiles;
    }

    /**
     * @param $path
     * @param array $names
     * @param array $selectedItems
     */
    private function delete($path, $names = [], $selectedItems = [])
    {
        foreach ($selectedItems as $item) {
            $name = $item['name'];
            $file = "$path/$name";
            $item['isFile'] ? Storage::delete($file) : Storage::deleteDirectory($file);
        }
    }

    /**
     * @param $path
     * @param $fileUpload
     * @param array $selectedItems
     */
    private function upload($path, $fileUpload, $selectedItems = [])
    {
        FacadesStorage::putFileAs($path, $fileUpload, $fileUpload->getClientOriginalName());
    }

    /**
     * @param $path
     * @param $name
     * @param $newName
     * @param array $commonFiles
     * @param array $selectedItems
     */
    private function rename($path, $name, $newName, $commonFiles = [], $selectedItems = [])
    {
        $fileOld = "$path/$name";
        $fileNew = "$path/$newName";
        FacadesStorage::move($fileOld, $fileNew);
    }

    /**
     * @param $path
     * @param array $names
     * @param array $selectedItems
     * @return array
     */
    private function getDetails($path, $names = [], $selectedItems = [])
    {
        $files = [];
        foreach ($names as $name) {
            $file = "$path/$name";
            $fileDetails = [
                'CreationTime' => 'Unknown',
                'Extension' => File::extension($file),
                'FullName' => $file,
                'Format' => FacadesStorage::mimeType($file),
                'LastWriteTime' => date('Y/m/d h:i:s', FacadesStorage::lastModified($file)),
                'LastAccessTime' => 'Unknown',
                'Length' => FacadesStorage::size($file),
                'Name' => File::name($file)
            ];
            array_push($files, $fileDetails);
        }
        return $files;
    }

    /**
     * @param $path
     * @param $name
     * @param $selectedItems
     * @param bool $isImage
     * @return mixed
     */
    private function download($path, $name, $selectedItems, $isImage = false)
    {
        $file = $isImage ? $path : "$path/$name";
        $filePath = FacadesStorage::getDriver()->getAdapter()->applyPathPrefix($file);
        return $filePath;
    }
}
