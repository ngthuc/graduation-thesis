package com.ngthuc.spsimct594.entity;

import com.fasterxml.jackson.annotation.JsonIgnoreProperties;

import javax.persistence.*;
import java.util.ArrayList;
import java.util.HashSet;
import java.util.List;
import java.util.Set;

@Entity
@Table(name = "grouppolicy")
public class GroupPolicy {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id", nullable = false)
    private Long id;

    @OneToOne
	@JoinColumn(name = "aPartOf", nullable = false)
	private Policy policy;

    @OneToMany
	@JoinColumn(name = "groups")
	private List<Organisation> organisations;

    @OneToMany
	@JoinColumn(name = "contacts")
	private List<User> users = new ArrayList<User>();

    @Column(name = "groupsType", length = 20)
	private String groupsType;

	@Column(name = "contactsType", length = 20)
	private String contactsType;

    public GroupPolicy() {}

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public Policy getPolicy() {
		return policy;
	}

	public void setPolicy(Policy policy) {
		this.policy = policy;
	}

	public List<Organisation> getOrganisations() {
		return organisations;
	}

	public void setOrganisations(List<Organisation> organisations) {
		this.organisations = organisations;
	}

	public List<User> getUsers() {
		return users;
	}

	public void setUsers(List<User> users) {
		this.users = users;
	}

	public String getGroupsType() {
		return groupsType;
	}

	public void setGroupsType(String groupsType) {
		this.groupsType = groupsType;
	}

	public String getContactsType() {
		return contactsType;
	}

	public void setContactsType(String contactsType) {
		this.contactsType = contactsType;
	}
}
