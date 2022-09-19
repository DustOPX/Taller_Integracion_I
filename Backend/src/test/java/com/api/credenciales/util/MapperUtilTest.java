package com.api.credenciales.util;

import static org.junit.Assert.assertEquals;

import java.util.ArrayList;
import java.util.HashSet;
import java.util.Set;

import org.junit.jupiter.api.AfterEach;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;
import org.junit.jupiter.api.extension.ExtendWith;
import org.mockito.InjectMocks;
import org.mockito.Mock;
import org.mockito.Mockito;
import org.mockito.junit.jupiter.MockitoExtension;
import org.modelmapper.ModelMapper;

import com.api.credenciales.dto.IdentityDTO;
import com.api.credenciales.dto.InformationDTO;
import com.api.credenciales.dto.RoleDTO;
import com.api.credenciales.model.Identity;
import com.api.credenciales.model.Information;
import com.api.credenciales.model.Role;

@ExtendWith(MockitoExtension.class)
class MapperUtilTest {
  
  
  @Mock
  private ModelMapper modelMapper;
  
  @InjectMocks
  private MapperUtil mapperUtil;
  
  // ----------------------------------------------------------------------
  
  private Role role ;
  private RoleDTO roleDTO ;
  
  private Information information ;
  private InformationDTO informationDTO ;
  
  private Identity identity ;
  private IdentityDTO identityDTO ;
  
  private Set< Role > listRole = new HashSet< Role >() ;
  private Set< RoleDTO > listRoleDTO = new HashSet< RoleDTO >() ;
  
  // ----------------------------------------------------------------------

  @BeforeEach
  protected void setUp() throws Exception {
    
    this.mapperUtil = Mockito.mock( MapperUtil.class ) ;
    
    // -------------------------
    
    this.role = Mockito.mock( Role.class ) ;
    this.role.setName( "test01" ) ;
    this.role.setStatus( true ) ;
    
    this.roleDTO = Mockito.mock( RoleDTO.class ) ;
    this.roleDTO.setName( "test01" ) ;
    this.roleDTO.setStatus( true ) ;
    
    // -------------------------
    
    this.information = Mockito.mock( Information.class ) ;
    this.information.setName( "nombre" ) ;
    this.information.setLastName( "apellido" ) ;
    this.information.setAge( 20 ) ;
    this.information.setCellPhonoNumber( "123456789" ) ;
    this.information.setEmail( "email@email.com" ) ;
    this.information.setDni( "987654321" ) ;
    this.information.setCountry( "pais" ) ;
    this.information.setCity( "ciudad" ) ;
    this.information.setImage( true ) ;
    
    this.informationDTO = Mockito.mock( InformationDTO.class ) ;
    this.informationDTO.setName( "nombre" ) ;
    this.informationDTO.setLastName( "apellido" ) ;
    this.informationDTO.setAge( 20 ) ;
    this.informationDTO.setCellPhonoNumber( "123456789" ) ;
    this.informationDTO.setEmail( "email@email.com" ) ;
    this.informationDTO.setDni( "987654321" ) ;
    this.informationDTO.setCountry( "pais" ) ;
    this.informationDTO.setCity( "ciudad" ) ;
    this.informationDTO.setImage( true ) ;
    
    // -------------------------
    
    this.identity = Mockito.mock( Identity.class ) ;
    this.identity.setInformation( this.information ) ;
    this.identity.setKeyword( "password" ) ;
    this.identity.setStatus( true ) ;
    
    this.listRole.add( this.role ) ;
    
    this.identity.setListRoles( this.listRole ) ;
    
    this.identityDTO = Mockito.mock( IdentityDTO.class ) ;
    this.identityDTO.setInformation( this.informationDTO ) ;
    this.identityDTO.setKeyword( "password" ) ;
    this.identityDTO.setStatus( true ) ;
    
    this.listRoleDTO.add( this.roleDTO ) ;
    
    this.identityDTO.setListRoles( new ArrayList<>( this.listRoleDTO ) ) ;
    
  }

  @AfterEach
  protected void tearDown() throws Exception {
  }
  
  // ----------------------------------------------------------------------
  
  @Test
  void testRoleEntityToRoleDTO() {
    
    Mockito
      .when( this.mapperUtil.roleEntityToRoleDTO( this.role ) )
      .thenReturn( roleDTO ) 
      ;
    
    RoleDTO roleDTOTest = this.mapperUtil.roleEntityToRoleDTO( this.role ) ;
    
    // name equals
    assertEquals( this.roleDTO.getName() , roleDTOTest.getName() ) ;
    
    // status equals
    assertEquals( this.roleDTO.isStatus() , roleDTOTest.isStatus() ) ;
    
    // dto equals
    assertEquals( this.roleDTO , roleDTOTest ) ;
    
  }
  
  
  // ----------------------------------------------------------------------
  
  
  @Test
  void testRoleDTOToRoleEntity() {
    
    Mockito
      .when( this.mapperUtil.roleDTOToRoleEntity( this.roleDTO ) )
      .thenReturn( this.role ) 
      ;
    
    Role roleTest = this.mapperUtil.roleDTOToRoleEntity( this.roleDTO ) ;
    
    // name equals
    assertEquals( this.role.getName() , roleTest.getName() ) ;
    
    // status equals
    assertEquals( this.role.isStatus() , roleTest.isStatus() ) ;
    
    // dto equals
    assertEquals( this.role , roleTest ) ;
    
  }
  
  
  // ----------------------------------------------------------------------
  
  
  @Test
  void testInformationEntityToInformationDTO() {
    
    Mockito
      .when( this.mapperUtil.informationEntityToInformationDTO( this.information ) )
      .thenReturn( this.informationDTO ) 
      ;
    
    InformationDTO informationDTOTest = 
        this.mapperUtil.informationEntityToInformationDTO( this.information ) ;
    
    
    assertEquals( this.informationDTO.getName() , informationDTOTest.getName() ) ;
    
    assertEquals( this.informationDTO.getLastName() , informationDTOTest.getLastName() ) ;
    
    assertEquals( this.informationDTO.getAge() , informationDTOTest.getAge() ) ;
    
    assertEquals( this.informationDTO.getCellPhonoNumber() , informationDTOTest.getCellPhonoNumber() ) ;
    
    assertEquals( this.informationDTO.getEmail() , informationDTOTest.getEmail() ) ;
    
    assertEquals( this.informationDTO.getDni() , informationDTOTest.getDni() ) ;
    
    assertEquals( this.informationDTO.getCountry() , informationDTOTest.getCountry() ) ;
    
    assertEquals( this.informationDTO.getCity() , informationDTOTest.getCity() ) ;
    
    assertEquals( this.informationDTO.isImage() , informationDTOTest.isImage() ) ;
    
  }
  
  
  // ----------------------------------------------------------------------
  
  
  @Test
  void testInformationDTOToInformationEntity() {
    
    Mockito
      .when( this.mapperUtil.informationDTOToInformationEntity( this.informationDTO ) )
      .thenReturn( this.information ) 
      ;
    
    Information informationTest = 
        this.mapperUtil.informationDTOToInformationEntity( this.informationDTO ) ;
    
    
    assertEquals( this.information.getName() , informationTest.getName() ) ;
    
    assertEquals( this.information.getLastName() , informationTest.getLastName() ) ;
    
    assertEquals( this.information.getAge() , informationTest.getAge() ) ;
    
    assertEquals( this.information.getCellPhonoNumber() , informationTest.getCellPhonoNumber() ) ;
    
    assertEquals( this.information.getEmail() , informationTest.getEmail() ) ;
    
    assertEquals( this.information.getDni() , informationTest.getDni() ) ;
    
    assertEquals( this.information.getCountry() , informationTest.getCountry() ) ;
    
    assertEquals( this.information.getCity() , informationTest.getCity() ) ;
    
    assertEquals( this.information.isImage() , informationTest.isImage() ) ;
    
  }
  
  
  // ----------------------------------------------------------------------
  
  
  @Test
  void testIdentityEntityToIdentityDTO() {
    
    Mockito
      .when( this.mapperUtil.identityEntityToIdentityDTO( this.identity ) )
      .thenReturn( this.identityDTO ) 
      ;
    
    IdentityDTO identityDTOTest = 
        this.mapperUtil.identityEntityToIdentityDTO( this.identity ) ;
    
    
    assertEquals( this.identityDTO.getInformation() , identityDTOTest.getInformation() ) ;
    
    assertEquals( this.identityDTO.getKeyword() , identityDTOTest.getKeyword() ) ;
    
    assertEquals( this.identityDTO.getListRoles() , identityDTOTest.getListRoles() ) ;
    
    assertEquals( this.identityDTO.isStatus() , identityDTOTest.isStatus() ) ;
    
  }
  
  
  // ----------------------------------------------------------------------
  
  
  @Test
  void testIdentityDTOToIdentityEntity() {
    
    Mockito
      .when( this.mapperUtil.identityDTOToIdentityEntity( this.identityDTO ) )
      .thenReturn( this.identity ) 
      ;
    
    Identity identityTest = 
        this.mapperUtil.identityDTOToIdentityEntity( this.identityDTO ) ;
    
    
    assertEquals( this.identity.getInformation() , identityTest.getInformation() ) ;
    
    assertEquals( this.identity.getKeyword() , identityTest.getKeyword() ) ;
    
    assertEquals( this.identity.getListRoles() , identityTest.getListRoles() ) ;
    
    assertEquals( this.identity.isStatus() , identityTest.isStatus() ) ;
    
  }
  
  
}
